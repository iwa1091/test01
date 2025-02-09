<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function index()
    {
        // ページネーションを使用して7件ごとにデータを取得
        $contacts = Contact::with('category')->paginate(7);
        return view('admin.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'LIKE', "%{$request->input('query')}%")
                  ->orWhere('email', 'LIKE', "%{$request->input('query')}%");
            });
        }

        if ($request->filled('gender') && $request->input('gender') != 'all') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->input('category')}%");
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // ページネーションを使用して7件ごとに検索結果を取得
        $contacts = $query->paginate(7);
        return view('admin.search_results', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::with('category')->findOrFail($id);
        return response()->json($contact);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        Contact::destroy($id);
        return response()->json(['success' => 'データが削除されました。']);
    }

    public function export(Request $request)
    {
        $filename = 'contacts_export.csv';
        $contacts = Contact::query();

        // 検索条件の適用
        if ($request->has('query')) {
            $contacts->where(function($query) use ($request) {
                $query->where('first_name', 'like', '%'.$request->query('query').'%')
                      ->orWhere('last_name', 'like', '%'.$request->query('query').'%')
                      ->orWhere('email', 'like', '%'.$request->query('query').'%');
            });
        }

        if ($request->has('gender')) {
            if ($request->query('gender') !== 'all') {
                $contacts->where('gender', $request->query('gender'));
            }
        }

        if ($request->has('category')) {
            $contacts->whereHas('category', function($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->input('category')}%");
            });
        }

        if ($request->has('date')) {
            $contacts->whereDate('created_at', $request->query('date'));
        }

        $contacts = $contacts->get();

        $response = new StreamedResponse(function() use ($contacts) {
            $handle = fopen('php://output', 'w');
            // ヘッダー行を書き出す
            fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', '詳細']);

            // データ行を書き出す
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender,
                    $contact->email,
                    $contact->category->name,
                    $contact->detail,
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');

        return $response;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

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
}

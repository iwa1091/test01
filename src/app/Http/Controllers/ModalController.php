<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourModel;

class YourController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->input('id');
        YourModel::destroy($id);
        return response()->json(['success' => 'データが削除されました。']);
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('contacts.form', compact('categories'));
    }

    public function confirm(ContactFormRequest $request)
    {
        $validated = $request->validated();
        $phone = $validated['phone_1'] . '-' . $validated['phone_2'] . '-' . $validated['phone_3'];
        return view('contacts.confirm', compact('validated', 'phone'));
    }

    public function store(ContactFormRequest $request)
    {
        $validated = $request->validated();
        $phone = $validated['phone_1'] . '-' . $validated['phone_2'] . '-' . $validated['phone_3'];

        Contact::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'phone' => $phone,
            'address' => $validated['address'],
            'building' => $validated['building'],
            'category_id' => $validated['category'],
            'detail' => $validated['detail'],
        ]);

        return redirect()->route('contacts.thanks');
    }

        public function thanks()
    {
        return view('contacts.thanks');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index() {
    $categories = Category::all();
    return view('index', compact('categories'));
  }
  public function confirm(ContactRequest $request) {
    $tel = $request['tel_first'].$request['tel_second'].$request['tel_third'];
    $contact = new Contact($request->all());

    $contact->tel_first = $request->tel_first;
    $contact->tel_second = $request->tel_second;
    $contact->tel_third = $request->tel_third;
    $contact->tel = $contact->tel_first.$contact->tel_second.$contact->tel_third;

    $categories = Category::all();
    $category = $categories->firstWhere('id', $contact->category_id);
    return view('confirm', compact('contact', 'category'));
  }

  public function store(Request $request) {
    if ($request->action === 'submit') {
      Contact::create($request->except('action'));
      return view('thanks');
    }
    if ($request->action === 'back') {
      
      return redirect('/')->withInput($request->except('action'));
    }
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function success() {
    $contacts = Contact::with('category')->Paginate(7);
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;


class AdminController extends Controller
{
  public function search(Request $request) {
    $contacts = Contact::query()
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->paginate(7);
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
  }
  public function reset() {
    $contacts = Contact::with('category')->Paginate(7);
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
  }

  public function show(Contact $contact) {
    return response()->json([
      'id' => $contact->id,
      'category_id' => $contact->category_id,
      'first_name' => $contact->first_name,
      'last_name' => $contact->last_name,
      'gender' => $contact->gender,
      'email' => $contact->email,
      'tel' => $contact->tel,
      'address' => $contact->address,
      'building' => $contact->building,
      'detail' => $contact->detail,
    ]);
  }

  public function export() {
    $contacts = Contact::all();
    $response = new StreamedResponse(function() use ($contacts) {
      $stream = fopen('php://output', 'w');
      fwrite($stream, "\xEF\xBB\xBF");
      fputcsv($stream, ['ID', '姓', '名', '性別', 'メールアドレス', '電話番号']);
      foreach($contacts as $contact) {
        fputcsv($stream, [
          $contact->id,
          $contact->last_name,
          $contact->first_name,
          $contact->gender,
          $contact->email,
          $contact->tel,
        ]);
      }
      fclose($stream);
    });
    $response->headers->set('Content-Type', 'test/csv; charset=UTF-8');
    $response->headers->set(
      'Content-Disposition', 'attachment; filename="contacts.csv"'
    );
    return $response;
  }

  public function destroy(Request $request) {
    Contact::find($request->contact_id)->delete();
    return redirect('admin');
  }
}

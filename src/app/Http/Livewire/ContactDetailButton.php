<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactDetailButton extends Component
{
  public int $contactId;

  public function open(): void
  {
    $contact = Contact::findOrFail($this->contactId);

    $this->dispatchBrowserEvent('contact-modal:open', [
      'id' => $contact->id,
      'first_name'    => $contact->first_name,
      'last_name'    => $contact->last_name,
      'gender'  => $contact->gender,
      'email'  => $contact->email,
      'tel'  => $contact->tel,
      'address' => $contact->address,
      'building' => $contact->building,
      'category' => $contact->category->content,
      'detail' => $contact->detail,
    ]);
  }

  public function render()
  {
    return view('livewire.contact-detail-button');
  }
}

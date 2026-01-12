<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
        'last_name' => ['required', 'string', 'max:8'],
        'first_name' => ['required', 'string', 'max:8'],
        'gender' => ['required'],
        'email' => ['required', 'email'],
        'tel_first' => ['required', 'alpha_num', 'max:5'],
        'tel_second' => ['required', 'alpha_num', 'max:5'],
        'tel_third' => ['required', 'alpha_num', 'max:5'],
        'address' => ['required'],
        'category_id' => ['required'],
        'detail' => ['required', 'max:120'],
      ];
  }

  public function messages() {
    return [
      'last_name.required' => '姓を入力してください',
      'first_name.required' => '名を入力してください',
      'gender.required' => '性別を選択してください',
      'email.required' => 'メールアドレスを入力してください',
      'email.email' => 'メールアドレスはメール形式で入力してください',

      'tel_first.required' => '電話番号を入力してください',
      'tel_second.required' => '電話番号を入力してください',
      'tel_third.required' => '電話番号を入力してください',

      'tel_first.alpha_num' => '電話番号は 半角英数字で入力してください',
      'tel_second.alpha_num' => '電話番号は 半角英数字で入力してください',
      'tel_third.alpha_num' => '電話番号は 半角英数字で入力してください',

      'tel_first.max' => '電話番号は 5桁まで数字で入力してください',
      'tel_second.max' => '電話番号は 5桁まで数字で入力してください',
      'tel_third.max' => '電話番号は 5桁まで数字で入力してください',

      'address.required' => '住所を入力してください',
      'category_id.required' => 'お問い合わせの種類を選択してください',
      'detail.required' => 'お問い合わせ内容を入力してください',
      'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
    ];
  }
 }

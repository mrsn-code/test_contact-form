<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;
  
  public function category() {
    return $this->belongsTo(Category::class);
  }
  
  #gender labels
  const GENDER_MALE = 1;
  const GENDER_FEMALE = 2;
  const GENDER_OTHER = 3;
  const GENDER_LABELS = [
    self::GENDER_MALE => '男性',
    self::GENDER_FEMALE => '女性',
    self::GENDER_OTHER => 'その他',
  ];
  public function getGenderLabelAttribute() {
    return self::GENDER_LABELS[$this->gender];
  }


  public function scopeKeywordSearch($query, $keyword) {
    if(!empty($keyword)) {
      $query->where(function($q) use ($keyword) {
        $q->where('first_name', $keyword)
          ->orWhere('last_name', $keyword)
          ->orWhere('email', $keyword)
          ->orWhere('first_name', 'like', "%{$keyword}%")
          ->orWhere('last_name', 'like', "%{$keyword}%")
          ->orWhere('email', 'like', "%{$keyword}%");
      });
    }
  }
  public function scopeGenderSearch($query, $gender) {
    if(!empty($gender)) {
      $query->where('gender', $gender);
    }
  }
  public function scopeCategorySearch($query, $category_id) {
    if(!empty($category_id)) {
      $query->where('category_id', $category_id);
    }
  }
  public function scopeDateSearch($query, $date) {
    if(!empty($date)) {
      $query->whereDate('created_at', $date);
    }
  }

  protected $fillable = [
      'last_name', 'first_name', 'gender', 'email', 'tel',
      'address', 'building', 'category_id', 'detail'
  ];
}

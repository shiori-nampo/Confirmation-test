<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ContactController;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    // 検索画面（名前やメールアドレス）
    public function scopeKeywordSearch($query,$keyword)
    {
        if(!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('last_name','like', "%$keyword%")->orWhere('first_name','like', "%$keyword%")->orWhere('email','like', "%$keyword%");
        });
    }
        return $query;
    }


    //性別
        public function scopeGenderSearch($query,$gender)
        {
        if (!empty($gender) && $gender != '0') {
            $query->where('gender',$gender);
        }
        return $query;
    }


    // 検索（カテゴリーの種類）
    public function scopeCategorySearch($query,$category_id)
    {
        if (!empty($category_id)) {
        $query->where('category_id',$category_id);
        }
        return $query;
    }


        //日付
        public function scopeDateSearch($query,$date)
        {
        if (!empty($date)) {
            $query->whereDate('created_at',$date);
        }
        return $query;
    }

}

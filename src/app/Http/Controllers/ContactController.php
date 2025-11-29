<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{   //お問い合わせ入力画面
    public function index () {
        $categories = Category::all();

        return view('index',compact('categories'));
    }
    // 確認画面
    public function confirm(Request $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $contact = $request->only(['last_name','first_name','gender','email','address','building','category_id','detail']);

        $contact['tel'] = $tel;

        return view('confirm',compact('contact'));
    }
    // 保存
    public function store(Request $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $contact = $request->only(['last_name','first_name','gender','email','address','building','category_id','detail']);

        $contact['tel'] = $tel;

        Contact::create($contact);

        return redirect()->route('thanks');
    }


    // 管理画面一覧
    public function admin(Request $request)
    {
        $categories = Category::all();

        $query = Contact::with('category');

        $contacts = $query->paginate(7);

        return view('admin',compact('contacts','categories'));

    }


    //管理画面・検索
    public function search(Request $request)
    {
        $contacts = Contact::with('category')
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->paginate(7);

        $categories = Category::all();

        return view('admin',compact('contacts','categories'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactController extends Controller
{   //お問い合わせ入力画面
    public function index () {
        $categories = Category::all();

        return view('index',compact('categories'));
    }


    // 確認画面
    public function confirm(ContactRequest $request)
    {
        //GETアクセス時入力画面にリダイレクト
        if($request->isMethod('get')) {
            return redirect()->route('index');
        }


        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        $contact = $request->only(['last_name','first_name','gender','email','address','building','category_id','detail']);

        $contact['tel'] = $tel;

        $categories = \App\Models\Category::all();

        session([
            'old_input' => $request->all()
        ]);


        return view('confirm',compact('contact','categories'));
    }


    // 保存
    public function store(StoreRequest $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','tel','address','building','category_id','detail']);

        Contact::create($contact);

        return redirect()->route('thanks');
    }


    // 管理画面一覧
    public function admin(Request $request)
    {
        $categories = Category::all();

        $query = Contact::with('category');

        $contacts = $query->paginate(7);

        return view('/admin/admin',compact('contacts','categories'));

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

        return view('/admin/admin',compact('contacts','categories'));
    }


    //お問い合わせ削除
    public function destroy(Request $request)
    {
        Contact::findOrFail($request->id)->delete();

        return redirect('/admin/admin')->with('message','お問い合わせを削除しました');
    }


    //エクスポート
    public function export(Request $request)
    {
        $contacts = Contact::with('category')
        ->keywordSearch($request->keyword)
        ->genderSearch($request->gender)
        ->categorySearch($request->category_id)
        ->dateSearch($request->date)
        ->get();


        $response = new StreamedResponse(function () use ($contacts) {
            $stream = fopen('php://output', 'w');

            //日本語文字化け防止
            fwrite($stream,chr(0xEF).chr(0xBB).chr(0xBF));

            //ヘッダー行
            fputcsv($stream, [
                'ID','お名前','性別','メール','電話','住所','建物名','お問い合わせの種類','お問い合わせ内容','登録'
            ]);

            foreach ($contacts as $contact) {
                fputcsv($stream,[
                    $contact->id,
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->gender == 1 ? '男性' : '女性',
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->category->content ?? '未選択',
                    $contact->content,
                    $contact->created_at
                ]);
            }

            fclose($stream);
        });

        $response->headers->set('Content-Type','text/csv');
        $response->headers->set('Content-Disposition','attachment; filename="contacts.csv"');

        return $response;
    }
}
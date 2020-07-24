<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
  
    public function  create(Request $request)
    {
     // Varidationを行う
    $this->validate($request, Profile::$rules);
    $Profile = new Profile;
    $form = $request->all();
      
    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたimageを削除する
    unset($form['image']);
    // データベースに保存する
    $Profile->fill($form);
    $Profile->save();
      
    return redirect('admin/profile/create');
    }
    
     public function edit()
     {
        return view('admin.profile.edit');
     }
    
     public function update()
     {
        return redirect('admin/profile.edit');
     }
    
}



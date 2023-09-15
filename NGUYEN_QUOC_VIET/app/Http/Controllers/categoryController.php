<?php

namespace App\Http\Controllers;
use App\Models\categoryModel;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function home(){
        return view('layout/home');
    }

    function category(){
        $data = categoryModel::paginate(5);
        return view('category/category',compact('data'));
    }

    function addCat(Request $request){
        // $request->validate([
        //     'name'=>'required'
        // ]); 
        $rules = [
            'name'=>'required'
        ];
        $messages = [
            'required' => ':attribute không được để trống.'
        ];
        $request->validate($rules,$messages);

        $cat = new categoryModel();
        $cat->fill($request->all());
        $cat->save();

        if($cat){
            return back()->with('success','Thêm mới thành công');
        }else{
            return back()->with('fail','Lỗi rồi');
        }
    }
}

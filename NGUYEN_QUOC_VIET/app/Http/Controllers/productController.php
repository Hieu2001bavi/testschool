<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller
{
    function product()
    {
        $cat = categoryModel::all();
        return view('product/product', compact('cat'));
    }
    //Thêm mới
    function addPro(Request $request)
    {
        //validate
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:png,jpg',
            'price' => 'required',
            'description' => 'required'
        ];
        $messages = [
            'required' => ':attribute không được để trống.'
        ];
        $request->validate($rules, $messages);
        //Thêm mới
        $addPro = new productModel();
        $addPro->name = $request->input('name');
        $addPro->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('/images');
            $extention  = $file->getClientOriginalName();
            $filename = time() . '.' . $extention;
            $file->move($path, $filename);
            $data = array_merge($request->all(), ['image' => "images/" . $filename]);
            $addPro->fill($data);
        }
        $addPro->price = $request->input('price');
        $addPro->status = $request->input('status');
        $addPro->description = $request->input('description');
        $addPro->save();
        //Thông báo lỗi
        return redirect('listPro')->with('success', "Thêm mới thành công");
    }
    function listPro()
    {
        $data = productModel::paginate(5);
        return view('product/listPro', compact('data'));
    }
    //Sửa
    function edit($id)
    {
        $cat = categoryModel::all();
        $data = productModel::find($id);
        return view('product/editPro', compact('data', 'cat'));
    }
    function editPro(Request $request)
    {
        $pro = productModel::find($request->id);
        $pro->name = $request->input('name');
        $pro->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('/images');
            $extention  = $file->getClientOriginalName();
            $filename = time() . '.' . $extention;
            $file->move($path, $filename);
            $destination = $path . $pro->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $data = array_merge($request->all(), ['image' => "images/" . $filename]);
            // $pro->image = $filename;
            $pro->fill($data);
        }
        $pro->price = $request->input('price');
        $pro->status = $request->input('status');
        $pro->description = $request->input('description');
        $pro->update();
        return redirect('listPro')->with('success', "Sửa thành công");
    }

    //Xóa 
    function delete($id)
    {
        $new = productModel::find($id);
        $new->delete();
        return redirect('listPro')->with('success', "Xóa thành công!");
    }
}

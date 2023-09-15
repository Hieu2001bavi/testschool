@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1 class="text-center">Danh sách sản phẩm</h1>
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Giá($)</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Lựa chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $pro)
                <tr>
                <td>{{$pro->id}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->cat->name}}</td>
                <td><img src="{{$pro->image}}" width="50" height="50" alt=""></td>
                <td>{{$pro->price}}</td>
                <td>
                    @if($pro->status == 0)
                        {{"Ẩn"}}    
                    @else
                        {{"Hiện"}} 
                    @endif
                </td>
                <td>{{$pro->description}}</td>
                <td>
                    <a href="{{route('edit',$pro->id)}}" class="btn btn-primary btn-sm">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="{{route('delete',$pro->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        {{$data->links()}}
    </div>
    <div class="col-md-2"></div>
</div>

@stop
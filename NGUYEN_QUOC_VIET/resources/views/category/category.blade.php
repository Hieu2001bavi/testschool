@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Thêm mới danh mục</h1>
                <!-- Thông báo thành công or lỗi -->
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif
                @if(Session::get('<i class="fa fa-life-bouy" aria-hidden="true"></i>'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif
            <form method="post" action="{{route('addCat')}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span style="color:red">@error('name'){{ $message }}@enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
        <div class="col-md-6">
            <h1 class="text-center">Danh sách danh mục</h1>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên danh mục</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $cat)
                    <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</div>
@stop

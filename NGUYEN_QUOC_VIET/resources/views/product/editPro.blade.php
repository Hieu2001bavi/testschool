@extends('layout.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 card">
            <h1 class="text-center">Sửa thông tin sản phẩm</h1>
            <form class="card-body row" method="post" action="{{route('editPro')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <div class="hiden"><input type="hidden" name="id" id="id" value="{{ $data->id }}"></div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                            @foreach($cat as $catlist)
                                <option value="{{$catlist->id}}" {{($data->category_id == $catlist->id)?'selected':''}} >{{$catlist->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ảnh</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="image" name="image" value="{{$data->image}}">
                            <img class="mt-2" src="{{$data->image}}" width="150" height="150" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá($)</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <input class="form-control" type="text" name="description" id="description" value="{{$data->description}}">
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-label fw-bold">Trạng thái</label><br>
                        <input type="radio" name="status" id="An" value="0" {{($data->status)?'':'checked'}}>Ẩn 
                        <input type="radio" name="status" id="Hien" value="1" {{($data->status)?'checked':''}}>Hiện
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div> 
        <div class="col-md-4"></div>
    </div>
</div>
@stop
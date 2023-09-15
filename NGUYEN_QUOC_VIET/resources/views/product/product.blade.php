@extends('layout.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 card">
            <h1 class="text-center">Thêm mới sản phẩm</h1>
            <form class="card-body row" method="post" action="{{route('addPro')}}" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span style="color:red">@error('name'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Danh mục</label>
                        <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                            <option>--Chọn danh mục--</option>
                            @foreach($cat as $catlist)
                            <option value="{{$catlist->id}}">{{$catlist->name}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">@error('category_id'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ảnh</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <span style="color:red">@error('image'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Giá($)</label>
                        <input type="text" class="form-control" id="price" name="price">
                        <span style="color:red">@error('price'){{ $message }}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <input class="form-control" type="text" name="description" id="description">
                        <span style="color:red">@error('description'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-label fw-bold">Trạng thái</label><br>
                        <input type="radio" name="status" id="An" value="0" checked>Ẩn 
                        <input type="radio" name="status" id="Hien" value="1">Hiện
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div> 
        <div class="col-md-4"></div>
    </div>
</div>
@stop
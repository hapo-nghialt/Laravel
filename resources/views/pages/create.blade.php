@extends('layout.index')
@section('title')
Laravel CRUD | Create
@endsection
@section('content')
<b><h1 align="center">Thêm mới học sinh</h1></b>
<div class="container">
    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên học sinh</label><br>
            <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên học sinh"/>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Số điện thoại</label><br>
            <input class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại"/>
            @if ($errors->has('phone'))
                <div class="alert alert-danger">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Avatar</label><br>
            <input type="file" name="avatar" value="{{ old('avatar') }}">
            @if ($errors->has('avatar'))
                <div class="alert alert-danger">
                    {{ $errors->first('avatar') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Địa chỉ</label><br>
            <input class="form-control" name="address" value="{{ old('address') }}" placeholder="Nhập địa chỉ"/>
            @if ($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Giới tính</label><br>
            <label class="radio-inline">
                <input name="gender" value="0" checked="" type="radio">&nbsp;Nam 
            </label>
            <label class="radio-inline">
                <input name="gender" value="1" type="radio">&nbsp;Nữ
            </label>
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('students.index') }}" class="btn btn-danger">Quay lại</a>
    </form>
</div>
@endsection

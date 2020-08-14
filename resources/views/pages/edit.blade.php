@extends('layout.index')
@section('title')
Laravel CRUD | Edit
@endsection
@section('content')
<b><h1 align="center">Thông tin học sinh</h1></b>
<div class="container">
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Tên học sinh</label><br>
            <input class="form-control" name="name" value="{{ old('name', $student->name) }}"/>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Số điện thoại</label><br>
            <input class="form-control" name="phone" value="{{ old('phone', $student->phone) }}"/>
            @if ($errors->has('phone'))
                <div class="alert alert-danger">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Avatar</label><br>
            <div><img src="{{ asset('storage/'.$student->avatar) }}" class="rounded-circle"></div>
            <input type="file" name="avatar">
            @if ($errors->has('avatar'))
                <div class="alert alert-danger">
                    {{ $errors->first('avatar') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Địa chỉ</label><br>
            <input class="form-control" name="address" value="{{ old('address', $student->address) }}"/>
            @if ($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Giới tính</label><br>
            <label class="radio-inline">
                <input name="gender" value="0"
                @if ($student->gender == 0)
                    {{ "checked" }}
                @endif
                type="radio">&nbsp;Nam 
            </label>
            <label class="radio-inline">
                <input name="gender" value="1"
                @if ($student->gender == 1)
                    {{ "checked" }}
                @endif
                type="radio">&nbsp;Nữ
            </label>
        </div>
        <button type="submit" class="btn btn-success">Sửa</button>
        <a href="{{ route('students.index') }}" class="btn btn-danger">Quay lại</a>
    </form>
</div>
@endsection

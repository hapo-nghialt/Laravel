@extends('layout.index')
@section('title')
Thông tin học sinh
@endsection
@section('content')
    <b align="center"><h1>Thông tin học sinh</h1></b>
    <table class="table table-bordered" align="center">
    <tbody>
        <tr>
            <th scope="row">Họ tên</th>
            <td>{{ $student->name }}</td>
        </tr>
        <tr>
            <th scope="row">Giới tính</th>
            <td>
                @if ($student->gender == 0)
                    {{ "Nam" }}
                @else
                    {{ "Nữ" }}
                @endif
            </td>
        </tr>
        <tr>
            <th scope="row">Số điện thoại</th>
            <td>{{ $student->phone }}</td>
        </tr>
        <tr>
            <th scope="row">Avatar</th>
            <td>
                <div>
                    <img src="{{ asset('storage/'.$student->avatar) }}" width="100px" height="100px">
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">Địa chỉ</th>
            <td>{{ $student->address }}</td>
        </tr>
    </tbody>
    </table>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Sửa</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
    </form>
@endsection

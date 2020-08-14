@extends('layout.index')
@section('title')
Laravel CRUD
@endsection
@section('content')
    <b align="center"><h1>Quản lý học sinh</h1></b>
    <a href="students/create" class="btn btn-success">Thêm mới</a>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <table class="col-xl-9 table table-striped table-bordered table-hover" align="center">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Tên học sinh</th>
                <th>Số điện thoại</th>
                <th>Avatar</th>
                <th>Địa chỉ</th>
                <th>Giới tính</th>
                <th colspan="2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $users)
                <tr align="center">
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->phone }}</td>
                    <td>
                        <div><img src="storage/{{ $users->avatar }}" width="50px"></div>
                    </td>
                    <td>{{ $users->address }}</td>
                    <td>
                        @if ($users->gender == 0)
                            {{ "Nam" }}
                        @else
                            {{ "Nữ" }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $users->id) }}" class="btn btn-primary">Sửa</a>
                    </td>
                    <td>
                        <form action="{{ route('students.destroy', $users->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="float: right;">
        {{ $students->links() }}
    </div>
@endsection

@extends('home')
@section('conten')
<a href="{{ route('admin.add-lop') }}">Thêm lớp học</a>
<table class="table table-light">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên lớp </th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $result )    
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->nameClass }}</td>
                <td><a href="{{ route('admin.update-lop',['id'=>$result->id]) }}" class="btn btn-primary">Sửa</a></td>
                <td><a href="{{ route('admin.delete-lop', ['id' =>$result->id]) }}"  class="btn btn-danger">Xóa</a></td>
                
            </tr>
        @endforeach
        
    </tbody>
</table>
@endsection
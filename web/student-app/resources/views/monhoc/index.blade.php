@extends('home')
@section('conten')
<div class="row">
    <div class="col-5">
        <a href="{{ route('admin.add-monhoc') }}">Thêm môn học</a>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên môn học </th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $result )    
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->nameSub }}</td>
                        <td><a href="{{ route('admin.update-monhoc',['id'=>$result->id]) }}" class="btn btn-primary">Sửa</a></td>
                        <td><a href="{{ route('admin.delete-monhoc', ['id' =>$result->id]) }}"  class="btn btn-danger">Xóa</a></td> 
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection
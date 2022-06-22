@extends('home')
@section('conten')
<a href="{{ route('admin.add-sinhvien') }}">Thêm sinh viên</a>
<table class="table table-light">
<thead>
    <tr>
        <th>Id</th>
        <th>Tên sinh viên </th>
        <th>Hình ảnh</th>
        <th>Tuổi</th>
        <th>Môn học</th>
        <th>Lớp</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
</thead>
<tbody>
    @foreach ($result as $result )    
        <tr>
            <td>{{ $result['id'] }}</td>
            <td><a href="{{ route('admin.detail-sinhvien',['id' => $result['id']]) }}">{{ $result['name'] }}</a></td>
            <td><img src="{{ asset('storage/images/'.$result['imgae']) }}" alt="" width="50px"></td>
            <td>{{ $result['age']}}</td>
            <td>{{ $result['nameSub'] }}</td>
            <td>{{ $result['nameClass'] }}</td>
            <td>{{ $result['phone'] }}</td>
            <td>{{ $result['address'] }}</td>
            <td><a href="{{ route('admin.update-sinhvien',['id'=>$result['id']]) }}" class="btn btn-primary">Sửa</a></td>
            <td><a href="{{ route('admin.delete-sinhvien', ['id' =>$result['id']]) }}"  class="btn btn-danger">Xóa</a></td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection

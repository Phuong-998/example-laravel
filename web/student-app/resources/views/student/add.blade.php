@extends('home')
@section('conten')
<div class="row">
    <div class="col-6">
        <form action="{{ route('admin.hadnelAdd-sinhvien') }}" method="post" enctype="multipart/form-data" class="form-group offset-1">
            @csrf
            <label for="">Tên sinh viên</label>
            <input type="text" name="name" class="form-control">
            <label for="">Ảnh</label>
            <input type="file" name="image" id="" class="form-control">
            <label for="">Tuổi</label>
            <input type="number" name="age" id="" class="form-control">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" class="form-control">
            <label for="">SĐT</label>
            <input type="text" name="phone" id="" class="form-control">
            <label for="">Môn học</label>
            <select name="monhoc" id="" class="form-select">
                @foreach ($monhoc as $value )
                    <option value="{{ $value->id }}">{{ $value->nameSub }}</option>
                @endforeach
            </select>
            <label for="">Lớp chuyên ngành</label>
            <select name="lop" id="" class="form-select">
                @foreach ($lop as $value )
                <option value="{{ $value->id }}">{{ $value->nameClass }}</option>
            @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
@extends('home')
@section('conten')
<div class="row">
    <div class="col-6">
        <form action="{{ route('admin.hadnel-updatesinhvien') }}" method="post" class="form-control offset-1">
            @csrf
            <input type="hidden" name="id" value="{{ $result->id }}">
            <label for="">Tên sinh viên</label>
            <input type="text" name="name" value="{{ $result->name }}" class="form-control">
            <label for="">Tuổi</label>
            <input type="number" name="age" id="" value="{{ $result->age }}" class="form-control">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" value="{{ $result->address }}" class="form-control">
            <label for="">SĐT</label>
            <input type="text" name="phone" id="" value="{{ $result->phone }}" class="form-control">
            <label for="">Môn học</label>
            <select name="id_monhoc" id="" class="form-select">
                <option value="{{ $monhoc->id }}">{{ $monhoc->nameSub }}</option>
                @foreach ($listmonhoc as $value )
                    <option value="{{ $value->id }}">{{ $value->nameSub }}</option>
                @endforeach
            </select>
            <label for="">Lớp chuyên ngành</label>
            <select name="id_lop" id="" class="form-select">
                <option value="{{ $lop->id }}">{{ $lop->nameClass }}</option>
                @foreach ($listlop as $value )
                <option value="{{ $value->id }}">{{ $value->nameClass }}</option>
            @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
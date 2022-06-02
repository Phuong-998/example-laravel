@extends('home')
@section('conten')
<div class="row">
    <div class="col-5">
        <form action="{{ route('admin.hadnelAdd-monhoc') }}" method="post" class="form-group">
            @csrf
            <label for="">Tên môn học</label>
            <input type="text" name="name" class="form-control">
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
@extends('home')

@section('conten')
<div class="row">
    <div class="col-5">
        <form action="{{ route('admin.hadnelAdd-lop') }}" method="post" class="form-group offset-1">
            @csrf
            <label for="">Tên lớp</label>
            <input type="text" name="name" class="form-control">
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

@endsection
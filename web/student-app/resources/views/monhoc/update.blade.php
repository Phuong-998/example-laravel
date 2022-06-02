@extends('home')
@section('conten')
<div class="row">
    <div class="col-4">
        <form action="{{ route('admin.hadnel-updateMonhoc') }}" method="post" class="form-group">
            @csrf
            <label for="">Tên môn học</label>
            <input type="hidden" name="id" value="{{ $result->id }}">
            <input type="text" name="name" value="{{ $result->nameSub }}" id="" class="form-control">
            <button type="submit">submit</button>
        </form>
    </div>
     </div>

@endsection
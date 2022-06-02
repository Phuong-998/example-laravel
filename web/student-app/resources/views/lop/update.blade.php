@extends('home')
@section('conten')
<div class="row">
    <div class="col-5">
        <form action="{{ route('admin.hadnel-update') }}" method="post" class="form-group offset-1">
            @csrf   
            <label for="">Tên chuyên ngành</label>
            <input type="hidden" name="id" value="{{ $result->id }}">
            <input type="text" name="name" value="{{ $result->nameClass }}" id="" class="form-control">
            <button type="submit">submit</button>
        </form>
    </div>
</div>

@endsection
<div class="row">
    <div class="col-5">

    </div>
</div>
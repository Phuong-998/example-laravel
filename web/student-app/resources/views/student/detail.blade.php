@extends('home')
@section('conten')
<div class="row">
    <div class="col-3">
        <select name="" id="changImg"  class="form-select" >
            @foreach ($img as $value )
                <option value="{{ $value->id}}">{{ $value->des }}</option>    
        
            @endforeach
        </select>
    </div>
</div>
    {{-- @foreach ($img as $value )
        <img src="{{ asset('resize/'. $value->des . '/' . $value->img) }}" alt="">
    @endforeach --}}
    <img src="{{ asset('storage/images/'.$sinhvien->imgae) }}" alt=""  id="imgSize"><br>
    <label for="">Họ tên: {{ $sinhvien->name }}</label><br>
    <label for="">Họ tên: {{ $sinhvien->age }}</label><br>
    <label for="">Họ tên: {{ $sinhvien->address }}</label><br>
    <label for="">Họ tên: {{ $sinhvien->phone }}</label><br>
    <label for="">Họ tên: {{ $lop->nameClass }}</label><br>
    <label for="">Họ tên: {{ $monhoc->nameSub }}</label>
    @push('javascripts')
        <script>
            $("#changImg").change(function(){
               var id = $("#changImg").val(); 
                $.ajax({
                    url: "{{ route('admin.detail-getImgSize') }}",
                    type: "GET",
                    data: {id},
                    success: function(data){
                        var source = "{{ asset('resize') }}" + '/' + data.des + '/' + data.img;
                        $("#imgSize").attr("src",source);
                    }
                })
            });;
        </script>
    @endpush
@endsection
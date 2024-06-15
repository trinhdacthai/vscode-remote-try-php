{{-- @extends('Admin.Layouts.Master')
@section('title','Người dùng')
@section('content')
<form action="{{route('quan-tri.vai-tro.them')}}" method="post">
    @csrf
<div class="row">
<div class="col-6 pl-5">
    <div class="form-group">
        <label>Tên Vai trò</label>
        <input type="text" value="{{old('designation_name')}}" name="designation_name" class="form-control">
        @if( $errors->count()>0 && $errors->has('designation_name'))
            <span class="text-danger">{{$errors->first('designation_name')}}</span>
        @endif
    </div>
    
   

</div>

<div class="col-6 pl-5">
    <label for="">Tên Phòng ban</label>
    <select class="select" name="department_id" id="">
        @foreach ($list['phongban'] as $i )
        <option value="{{$i->id}}">{{$i->name}}</option>   
        @endforeach
        <option value=""></option>
    </select>

</div>
<div class="col-12 mt-3 text-center">
    <button type="submit" class="btn btn-success">Thêm</button>
</div>
</div>

</form>




@endsection
@section('script')
    <script>

    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection
 --}}

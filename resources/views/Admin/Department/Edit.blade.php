@extends('Admin.Layouts.Master')
@section('title','Người dùng')
@section('content')
<form action="" method="post">
    @csrf
<div class="row">
<div class="col-4 pl-5">
    <div class="form-group">
        <label>Tên phòng ban</label>
        <input type="text" value="{{old('department_name')??$list['department']->name}}" name="department_name" class="form-control">
        @if( $errors->count()>0 && $errors->has('department_name'))
            <span class="text-danger">{{$errors->first('department_name')}}</span>
        @endif
    </div>
    <div class="col-12 mt-3 text-center">
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </div>

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


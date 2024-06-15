@extends('Admin.Layouts.Master')
@section('title','Setting')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Change Password</h3>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group">
                        <label>Old password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection

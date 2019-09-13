@extends('user.master')
@section('title', 'เพิ่มข้อมูลผู้ใช้ระบบ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 align="center">เพิ่มข้อมูลผู้ใช้งาน</h3>
            <br>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{url('user')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" placeholder="ป้อนชื่อ">
                </div>
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" placeholder="ป้อนนามสกุล">
                </div>
                <div class="form-group">
                    <input type="submit" value="บันทึก" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

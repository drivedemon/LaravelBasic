@extends('user.master')
@section('title', 'แก้ไขข้อมูลผู้ใช้ระบบ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h3 align="center">แก้ไขข้อมูลผู้ใช้ระบบ</h3>
            <br>
            <!-- @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <form method="POST" action="{{action('UsersController@update', $id)}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="fname" class="form-control" value="{{$user->fname}}" placeholder="ป้อนชื่อ">
                    @error('fname')
                    <STRONG style="color:red;">{{$message}}</STRONG>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="lname" class="form-control" value="{{$user->lname}}" placeholder="ป้อนนามสกุล">
                    @error('lname')
                    <STRONG style="color:red;">{{$message}}</STRONG>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="บันทึก" class="btn btn-primary">
                </div>
                <input type="hidden" name="_method" value="PATCH">
            </form>
        </div>
    </div>
</div>
@endsection

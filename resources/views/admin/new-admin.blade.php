@extends('main.admin')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>New Admin</h2>
            @if (session('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{session('error')}}</li>
                    </ul> 
                </div>
            @endif
            <form action="/admin/admins/new-admin" method="POST" autocomplete="off">
                @csrf
                <label for="">Username: </label><br>
                <input type="text" name="username" id="" value="{{old('username')}}"><br>
                <label for="">Password: </label><br>
                <input type="password" name="password" id=""><br>
                <label for="">Confirm Password:</label><br>
                <input type="password" name="con-password" id=""><br>
                <input type="submit" value="Register" class="btn btn-success btn-sm" style="margin-top: 5px;">
            </form>
        </div>
    </div>
</div>
@endsection
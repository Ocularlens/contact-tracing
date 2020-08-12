@extends('main.admin')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Account Details</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> 
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul> 
                </div>
            @endif
            <p>    
                Username<b id="username">: {{Auth::guard('admin')->user()->username}}</b> 
                <button id="change-username" onclick="hide_username()" class="btn btn-link btn-sm">Change</button>
                <form action="/admin/account/change-username" id="username-field" hidden method="POST">
                    @csrf
                    <input type="text" name="username" id="">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                </form>
                <button id="show-username" onclick="show_username()" class="btn btn-link btn-sm" hidden>Cancel</button>
            </p>
            <p>
                Password<b id="password">: ********</b>
                <button id="change-password" onclick="hide_password()" class="btn btn-link btn-sm">Change</button>
                <form action="/admin/account/change-password" id="password-field" hidden method="POST">
                    @csrf
                    <input type="password" name="password" id="">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                </form>
                <button id="show-password" onclick="show_password()" class="btn btn-link btn-sm" hidden>Cancel</button>
            </p>
        </div>
    </div>
    <script>
        function hide_username(){
            document.getElementById('username').hidden = true;
            document.getElementById('change-username').hidden = true;
            document.getElementById('show-username').hidden = false;
            document.getElementById('username-field').hidden = false;
        }

        function show_username(){
            document.getElementById('username').hidden = false;
            document.getElementById('change-username').hidden = false;
            document.getElementById('show-username').hidden = true;
            document.getElementById('username-field').hidden = true;
        }

        function hide_password(){
            document.getElementById('password').hidden = true;
            document.getElementById('change-password').hidden = true;
            document.getElementById('show-password').hidden = false;
            document.getElementById('password-field').hidden = false;
        }

        function show_password(){
            document.getElementById('password').hidden = false;
            document.getElementById('change-password').hidden = false;
            document.getElementById('show-password').hidden = true;
            document.getElementById('password-field').hidden = true;
        }
    </script>
</div>
@endsection
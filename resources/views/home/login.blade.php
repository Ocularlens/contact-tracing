@extends('main.app')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Login</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>Success!</strong> Account Created
                        </div>  
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Account Does Not Exist
                        </div>  
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email Address:</span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password:</span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="row" style="text-align: right;">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('main.app')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Register</h4>
                    <p class="card-text">Fill up the following.</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul> 
                        </div>
                    @endif
                    <form action="/register" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Full name:</span>
                            </div>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email Address:</span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Contact number:</span>
                            </div>
                            <input type="text" name="contact" id="contact" class="form-control" value="{{old('contact')}}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password:</span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="row" style="text-align: right;">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
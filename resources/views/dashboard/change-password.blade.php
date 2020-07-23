@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul> 
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        <strong>*</strong> {{session('error')}}
                    </div>  
                @endif
                <form action="/dashboard/change-password" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Old Password:</span>
                        </div>
                        <input type="password" class="form-control" name="old-password" id="old-password">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">New Password:</span>
                        </div>
                        <input type="password" class="form-control" name="new-password" id="new-password">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Confirm New Password:</span>
                        </div>
                        <input type="password" class="form-control" name="con-new-password" id="con-new-password">
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
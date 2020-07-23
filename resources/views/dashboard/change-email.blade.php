@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <div class="card-body">
                <h4 class="card-title">Change Email</h4>
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
                <form action="/dashboard/change-email" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Old Email:</span>
                        </div>
                        <input type="email" class="form-control" name="old-email" id="old-email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">New Email:</span>
                        </div>
                        <input type="email" class="form-control" name="new-email" id="new-email">
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <div class="card-body">
                <h4 class="card-title">Change Contact</h4>
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
                <form action="/dashboard/change-contact" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Old Contact:</span>
                        </div>
                        <input type="text" class="form-control" name="old-email" id="old-contact">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">New Contact:</span>
                        </div>
                        <input type="text" class="form-control" name="new-email" id="new-contact">
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
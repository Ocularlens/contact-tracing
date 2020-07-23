@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">    
            <div class="card-body">
                <h4 class="card-title">Add Store</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul> 
                    </div>
                @endif
                <form action="/dashboard/store" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Store Name:</span>
                        </div>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <textarea name="description" id="description" placeholder="Description" rows="10" class="form-control"></textarea><br>
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <a href="/dashboard/store" class="btn btn-info btn-sm">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
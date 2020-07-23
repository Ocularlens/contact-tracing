@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{$store->store_id}}</td>
                            <td>{{$store->store_name}}</td>
                            <td>{{$store->description}}</td>
                            <td><a href="/dashboard/store/{{$store->store_id}}" class="btn btn-info btn-sm">Edit</a> 
                                <form action="{{ route('store.destroy', $store->store_id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                </form>
                                <a href="/dashboard/store/{{$store->store_id}}/logs" class="btn btn-warning btn-sm">View Logs</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-6">
                    <a href="/dashboard/store/create" class="btn btn-success btn-sm">Add Store</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card">
            <div class="card-body">
                <h4>My Logs</h4>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Owner</th>
                            <th>Date Visited</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->log_to_store as $store)
                            <tr>
                                <td>{{$store->store_name}}</td>
                                <td>{{$store->store_owner}}</td>
                                <td>{{date_format($store->pivot->created_at, 'M d, Y H:i:s')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
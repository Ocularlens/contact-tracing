@extends('main.dashboard')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 card">    
            <div class="card-body">
                <h4 class="card-title">Store logs</h4>
                <div class="row">
                    <div class="col-md-6">    
                        <div class="row">
                            <div class="col-lg-6">
                                {!! QrCode::size(150)->generate($_SERVER['SERVER_NAME'].'/store/'.$store->qr_code); !!}
                            </div>
                            <div class="col-lg-6">
                                Store Name : <strong>{{$store->store_name}}</strong> <br>
                                Description : <strong>{{$store->description}}</strong> <br>
                                Owner : <strong>{{Auth::user()->name}}</strong> <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Visitor's Name</th>
                                    <th>Date Visited</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($store->store_logs as $person)
                                    <tr>
                                        <td>{{$person->name}}</td>
                                        <td>{{date_format($person->pivot->created_at, 'M d, Y H:i:s')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                                {!! QrCode::size(150)->generate($_SERVER['SERVER_NAME'].'/dashboard/store/'.$store->qr_code.'/qrlog'); !!}
                            </div>
                            <div class="col-lg-6">
                                Store Name : <strong>{{$store->store_name}}</strong> <br>
                                Description : <strong>{{$store->description}}</strong> <br>
                                Owner : <strong>{{Auth::user()->name}}</strong> <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </div>
                        </div>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Visitor's Name</th>
                                    <th>Date Visited</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($store->store_logs as $person)
                                    <tr>
                                        <td>{{$person->name}}</td>
                                        <td>{{date_format($person->pivot->created_at, 'M d, Y H:i:s')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function(){
                              $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('main.admin')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Logs</h4>
            <input id="myInput" type="text" placeholder="Search.." style="width:inherit;margin-bottom:5px">
            <table class="table">
                <thead>
                    <tr>
                        <th>User's Full name</th>
                        <th>Contact</th>
                        <th>Email address</th>
                        <th>Shop ID</th>
                        <th>Date Visited</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{$log->name}}</td>
                            <td>{{$log->contact}}</td>
                            <td>{{$log->email}}</td>
                            <td>{{$log->store_id}}</td>
                            <td>{{date_format(date_create($log->created_at), 'M d, Y H:i:s')}}</td>
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
@endsection
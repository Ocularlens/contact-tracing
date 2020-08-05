@extends('main.admin')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Users</h4>
            <input id="myInput" type="text" placeholder="Search.." style="width:inherit;margin-bottom:5px">
            <table class="table">
                <thead>
                    <tr>
                        <th>User's Full name</th>
                        <th>Contact</th>
                        <th>Email address</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->contact}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{date_format(date_create($user->created_at), 'M d, Y H:i:s')}}</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
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
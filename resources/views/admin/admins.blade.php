@extends('main.admin')
@section('page title', 'Ocularlens')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Admins</h4>
            @if (session('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul> 
                </div>
            @endif
            <input id="myInput" type="text" placeholder="Search.." style="width:inherit;margin-bottom:5px">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->username}}</td>
                            <td>{{date_format(date_create($admin->created_at), 'M d, Y H:i:s')}}</td>
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
            <a href="/admin/admins/new-admin" class="btn btn-success">New Admin</a>
        </div>
    </div>
</div>
@endsection
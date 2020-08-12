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
                        <th>ID</th>
                        <th>Store name</th>
                        <th>Description</th>
                        <th>Owner's ID</th>
                        <th>Date added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{$store->store_id}}</td>
                            <td>{{$store->store_name}}</td>
                            <td>{{$store->description}}</td>
                            <td>{{$store->store_owner}}</td>
                            <td>{{date_format(date_create($store->created_at), 'M d, Y H:i:s')}}</td>
                            <td>
                                <a href="/admin/stores/{{$store->store_id}}/delete" class="btn btn-danger">Delete</a>
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
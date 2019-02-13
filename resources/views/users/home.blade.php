@extends('layouts.master')
@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <h4 class="m-0">Users</h4>
                        </div>
                        <div class="col-auto">
                            <a href="/users/create" class="btn btn-primary">Add new user</a>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->birthday}}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="/users/update/{{$user->id}}" class="btn btn-primary">Edit</a>

                                    <form action="/users/{{$user->id}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function drop(id) {
            let confirmation = confirm("Are you sure?");
            if (!confirmation)
                return;

            axios.delete(`/users/${id}`).then(response => {
                window.location.reload()
            });
        }
    </script>
@endsection
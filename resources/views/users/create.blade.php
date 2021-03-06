@extends('layouts.master')
@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            @include('layouts.errors')
            <div class="card">

                <div class="card-body">
                    <form action="/users" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" value="{{ old('name') }}" name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" value="{{ old('email') }}" name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" value="{{ old('password') }}" name="password" type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input id="birthday" value="{{old('birthday')}}" name="birthday" type="text"
                                   class="form-control">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
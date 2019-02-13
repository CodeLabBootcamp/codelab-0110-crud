<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function home()
    {
        $users = DB::table("users")->get();

        return view('users.home')->with('users', $users);
    }

    public function createForm()
    {
        return view('users.create');
    }

    public function create(Request $request)
    {
        $rules = [
            "name" => "required",
            "email" => ["required", "unique:users"],
            "birthday" => "required",
            "password" => "required"
        ];

        $data = $this->validate($request, $rules);
        DB::table("users")->insert($data);

        return Response::redirectTo('/users');
    }

    public function drop($id)
    {
        DB::table("users")->delete($id);
        return Response::redirectTo('/users');
    }

    public function updateForm($id)
    {
        $user = DB::table("users")->find($id);

        return view('users.update')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            "name" => "required",
            "email" => ["required", Rule::unique('users')->ignore($id),],
            "birthday" => "required",
            "password" => "required"
        ];

        $data = $this->validate($request, $rules);

        DB::table("users")->where("id","=",$id)->update($data);

        return Response::redirectTo('/users');
    }
}


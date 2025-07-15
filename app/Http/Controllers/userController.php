<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $users=User::paginate(5);
         $admins=User::Admin()->count();
       
         $user=User::user()->count();
        //({{ $users->total() }})

        return view("admin.users.index",compact("users","admins","user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $users=User::findOrFail($id);
        $roles=["admin","user"];

        return view("admin.users.change_role",compact("users","roles"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "role"=>"required|in:admin,user"
        ]);

        $user=User::findOrFail($id);
        $user->role=$request->role;
        $user->update();
        return redirect()->back()->with("success", "role updated  Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

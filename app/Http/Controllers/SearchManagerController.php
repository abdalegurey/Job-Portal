<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class SearchManagerController extends Controller
{
    //

    public function index(Request  $request){

        $query= $request->input("query");

        $managers= collect();

        if($query){
            $managers=Employee::where("name", "LIKE", "%$query%")->get();

        }


        return view("admin.EmployeeSearch", compact("managers", "query"));




    }
}

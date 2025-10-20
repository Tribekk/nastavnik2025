<?php
namespace App\Http\Controllers;


use App\project;
//namespace App\Admin\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use Support\Controller;




class projectController extends Controller
{


    public function store(Request $request)
    {


            return view('employer.project.list.view');

    }

    public function projectList(Request $request )
    {


        return view('employer.project.list.view')
           ;
    }
    public function projList(Request $request )
    {


        return view('employer.project.create')
           ;
    }
    public function projeList(Request $request )
    {


        return view('employer.project.create')
           ;
    }
    public function pro(Request $request)
    {

    }

}

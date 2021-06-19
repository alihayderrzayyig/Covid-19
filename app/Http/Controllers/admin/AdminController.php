<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Protection;
use App\Models\Symptom;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin']);
    }


    
    public function index(){
        return view('admin.index',[
            'protections' => Protection::all(),
            'symptoms' => Symptom::all(),
        ]);
    }
}

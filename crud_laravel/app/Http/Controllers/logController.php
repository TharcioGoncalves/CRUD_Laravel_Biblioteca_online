<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logController extends Controller
{
    public function index(){
        return view("login");
    }
    public function cadastrar(){
        return view("cadastro");
    }
}

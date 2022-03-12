<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        // $todos = Todo::all();
        // return view('welcome', ['todos' => $todos]);
        return view('welcome');
    }
}

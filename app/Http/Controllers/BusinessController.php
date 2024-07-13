<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function social()
    {
        return view('social.index');
    }

    public function about()
    {
        return view('about.index');
    }

    public function intellectual()
    {
        return view('intellectual.index');
    }

    public function questions()
    {
        return view('questions.index');
    }

    public function personal()
    {
        return view('personal.index');
    }

    public function term()
    {
        return view('term.index');
    }
}

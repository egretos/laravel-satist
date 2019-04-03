<?php

namespace App\Http\Controllers;

class FieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('field.index');
    }
}
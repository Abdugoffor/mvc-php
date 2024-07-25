<?php

namespace App\Controllers;

use MVC\View\View;

class TestController
{
    public function __construct()
    {
        layout('layouts/main');
    }
    public function index()
    {
        return view('index');
    }
    public function create()
    {
        return view('create');
    }

    public function createData()
    {
        $data = $_POST['create'];
        return view('test', ['data' => $data]);
    }
}

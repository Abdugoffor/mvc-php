<?php

namespace App\Controllers;

use MVC\Requests\FormRequest;
use MVC\Requests\PostCreateRequest;
use MVC\View\View;

class TestController
{
    public $xatoliklar;

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
        $request = new PostCreateRequest($_POST);

        if (!$request->validate()) {
            
            $this->xatoliklar = $request->errors();
        }
        return view('test', ['data' => $request->all(), 'errors' => $this->xatoliklar]);
    }
}

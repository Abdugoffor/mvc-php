<?php

namespace App\Controllers;

use App\Models\Post;
use MVC\Requests\FormRequest;
use MVC\Requests\PostCreateRequest;
use MVC\View\View;

class TestController
{
    public $validationErrors;

    public function __construct()
    {
        layout('layouts/main');
    }
    public function index()
    {
        $models = Post::all();
        return view('index', ['data' => $models]);
    }
    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $request = new PostCreateRequest($_POST);

        if (!$request->validate()) {

            $this->validationErrors = $request->errors();

            return view('create', ['data' => $request->all(), 'errors' => $this->validationErrors]);
        }
        Post::create($request->all());
        
        return redirect('/');
    }

    public function postShow($id)
    {
        $model = Post::find($id);
        return view('show', ['data' => $model]);
    }
}

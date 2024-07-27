<?php

namespace MVC\Requests;

use MVC\Requests\FormRequest;

class PostCreateRequest extends FormRequest
{
    protected array $rules = [
        'title' => 'required',
        'body' => 'required',
    ];

    protected array $messages = [
        'title.required' => 'Title maydoni talab qilinadi.',
        'body.required' => 'Body maydoni talab qilinadi.',
    ];
}

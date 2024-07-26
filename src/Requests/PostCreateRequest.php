<?php

namespace MVC\Requests;

use MVC\Requests\FormRequest;

class PostCreateRequest extends FormRequest
{
    protected array $rules = [
        'name' => 'required|string|max:255',
        'text' => 'required|string',
    ];

    protected array $messages = [
        'name.required' => 'Name maydoni talab qilinadi.',
        'name.string' => 'Name maydoni matn bo\'lishi kerak.',
        'name.max' => 'Name maydoni 255 belgidan ortiq bo\'lmasligi kerak.',
        'text.required' => 'Text maydoni talab qilinadi.',
        'text.string' => 'Text maydoni matn bo\'lishi kerak.',
    ];
}

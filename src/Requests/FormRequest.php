<?php

namespace MVC\Requests;

class FormRequest
{
    protected array $data;

    protected array $rules = [];

    protected array $messages = [];

    protected array $errors = [];

    public function __construct(array $data = [])
    {
        $this->data = $data ? $data : $_POST;
    }

    public function validate(): bool
    {
        foreach ($this->rules as $field => $rule) {
            $rules = explode('|', $rule);

            foreach ($rules as $r) {
                $this->applyRule($field, $r);
            }
        }
        return empty($this->errors);
    }

    protected function applyRule($field, $rule)
    {
        $rulePars = explode(':', $rule);
        $ruleName = $rulePars[0];
        $ruleValue = $rulePars[1] ?? null;
        
        switch ($ruleName) {
            case 'required':
                if (empty($this->data[$field])) {
                    $this->errors[$field] = $this->messages[$field . '.required'] ?? 'This field is required.';
                }
                break;

            case 'numeric':
                if (!is_numeric($this->data[$field])) {
                    $this->errors[$field] = $this->messages[$field . '.numeric'] ?? 'This field must be a number.';
                }
                break;

            case 'email':
                if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field] = $this->messages[$field . '.email'] ?? 'This field must be a valid email.';
                }
                break;

            case 'min':
                if (strlen($this->data[$field]) < $ruleValue) {
                    $this->errors[$field] = $this->messages[$field . '.min'] ?? 'This field must have at least ' . $ruleValue . ' characters.';
                }
                break;

            case 'max':
                if (strlen($this->data[$field]) > $ruleValue) {
                    $this->errors[$field] = $this->messages[$field . '.max'] ?? 'This field may not be greater than ' . $ruleValue . ' characters.';
                }
                break;

            case 'string':
                if (!is_string($this->data[$field])) {
                    $this->errors[$field] = $this->messages[$field . '.string'] ?? 'This field must be a string.';
                }
                break;

            default:
                break;
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function all(): array
    {
        unset($this->data['ok']);
        return $this->data;
    }

    public function data(): array
    {
        return $this->data;
    }
}

<?php

namespace App\Http\Requests;

class FormRequest
{
    protected array $data = [];

    public function merge(array $newData): void
    {
        $this->data = array_merge($this->data, $newData);
    }

    public function input(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function rules(): array
    {
        return [];
    }

    public function validate()
    {
        $rules = $this->rules();
        $errors = [];

        foreach ($rules as $field => $rule) {
            if ($rule === 'required') {
                $value = $this->input($field);

                if (empty($value) && $value !== '0') {
                    $errors[$field] = "The field [{$field}] is required";
                };
            } else {
                echo "Dev Error: The rule [{$rule}] for field [{$field}] is not supported.";
                die();
            }
        }
        if (!empty($errors)) {
            echo "<pre>";
            print_r($errors);
            echo "</pre>";
            die();
        }
    }
    public function validated(): array
    {
        $this->validate();
        return $this->data;
    }
}

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

    public function validated(): array
    {
        return $this->data;
    }
}

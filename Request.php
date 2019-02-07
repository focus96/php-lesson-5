<?php

class Request
{
    protected $errors = [];
    protected $cleanPostParams = [];

    public function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "GET";
    }

    public function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === "POST";
    }

    public function required(string $name, string $localName = '')
    {
        if(empty($this->getFromPostWithClean($name))) {
            $this->errors[$name][] = 'Поле обязательно для заполнения';
        }

        return $this;
    }

    public function isValid(): bool
    {
        return !count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFromPostWithClean(string $name)
    {
        if(isset($this->cleanPostParams[$name]) && $this->cleanPostParams[$name]) {
            return $this->cleanPostParams[$name];
        }else {
            $value = $_POST[$name];
            $value = trim($value);
            $value = htmlspecialchars($value);
            $this->cleanPostParams[$name] = $value;

            return $value;
        }
    }

    // required
    // array
    // between
    // e-mail
    // greaterThan
    // in
    // lessThan
    // max
    // min
    // notIn
    // string
}
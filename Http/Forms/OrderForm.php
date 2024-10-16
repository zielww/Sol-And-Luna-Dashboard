<?php

namespace Http\Forms;

use Core\Validator;

class OrderForm extends Form
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['status'], 3, 50)) {
            $this->errors['name'] = "status";
        }
    }
}
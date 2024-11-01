<?php

namespace Http\Forms;

use Core\Validator;

class CategoryForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['name'], 3, 50)) {
            $this->errors['name'] = "category name";
        }

        if (!Validator::string($this->attributes['visibility'], 1, 100)) {
            $this->errors['visibility'] = "visibility";
        }

        if (!Validator::string($this->attributes['description'], 5, 200)) {
            $this->errors['description'] = "description";
        }
    }
}
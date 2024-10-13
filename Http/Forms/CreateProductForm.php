<?php

namespace Http\Forms;

use Core\Validator;

class CreateProductForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['name'], 3, 50)) {
            $this->errors['name'] = "product name";
        }

        if (!Validator::number($this->attributes['price'], 1, 999999)) {
            $this->errors['price'] = "pricing.";
        }

        if (!Validator::number($this->attributes['quantity'], 1, 999999)) {
            $this->errors['quantity'] = "quantity.";
        }

        if (!Validator::string($this->attributes['category'],1,100)) {
            $this->errors['category'] = "category";
        }

        if (!Validator::string($this->attributes['visibility'], 1, 100)) {
            $this->errors['visibility'] = "visibility";
        }

        if (!Validator::string($this->attributes['description'], 5, 50)) {
            $this->errors['description'] = "description";
        }

        if (!Validator::images($this->attributes['images'])) {
            $this->errors['images'] = "images";
        }
    }
}
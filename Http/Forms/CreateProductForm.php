<?php

namespace Http\Forms;

use Core\Validator;

class CreateProductForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['name'])) {
            $this->errors['name'] = "enter a valid product name";
        }

        if (!Validator::number($this->attributes['price'], 1, 999999)) {
            $this->errors['price'] = "enter a valid pricing.";
        }

        if (!Validator::number($this->attributes['quantity'], 1, 999999)) {
            $this->errors['quantity'] = "enter a valid quantity.";
        }

        if (!Validator::string($this->attributes['category'],1,100)) {
            $this->errors['category'] = "enter a valid category";
        }

        if (!Validator::string($this->attributes['visibility'], 1, 100)) {
            $this->errors['visibility'] = "enter a valid visibility";
        }

        if (!Validator::string($this->attributes['description'], 5, 50)) {
            $this->errors['description'] = "enter a valid description";
        }

        if (!Validator::images($this->attributes['images'])) {
            $this->errors['images'] = "enter valid images";
        }
    }
}
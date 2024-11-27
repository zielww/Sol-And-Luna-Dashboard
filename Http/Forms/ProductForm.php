<?php

namespace Http\Forms;

use Core\Validator;

class ProductForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['name'], 3, 50)) {
            $this->errors['name'] = "product name";
        }

        if (!Validator::number($this->attributes['price'], 1, 999999)) {
            $this->errors['price'] = "pricing";
        }

        if (!Validator::number($this->attributes['quantity'], 1, 999999)) {
            $this->errors['quantity'] = "quantity";
        }

        foreach ($this->attributes['category'] as $category) {
            if (!Validator::string($category,1,100)) {
                $this->errors['category'] = "category";
            }
        }

        if (!Validator::string($this->attributes['visibility'], 1, 100)) {
            $this->errors['visibility'] = "visibility";
        }

        if (!Validator::string($this->attributes['description'], 5, 5000)) {
            $this->errors['description'] = "description";
        }

        if ($this->attributes['images']) {
            if (!Validator::images($this->attributes['images'])) {
                $this->errors['images'] = "images";
            }
        }
    }
}
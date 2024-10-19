<?php

namespace Http\Forms;

use Core\Validator;

class CustomerForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['first_name'], 3, 50)) {
            $this->errors['name'] = "first name";
        }

        if (!Validator::string($this->attributes['last_name'], 3, 50)) {
            $this->errors['name'] = "first name";
        }

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = "email";
        }

        if ($this->attributes['password']) {
            if (!Validator::string($this->attributes['password'],3,20)) {
                $this->errors['password'] = "password";
            }
        }

        if (!Validator::phone($this->attributes['phone'])) {
            $this->errors['phone'] = "phone";
        }

        if (!Validator::string($this->attributes['country'], 5, 50)) {
            $this->errors['country'] = "country";
        }

        if (!empty($this->attributes['image']['tmp_name'])) {
            if (!Validator::image($this->attributes['image'])) {
                $this->errors['image'] = "image";
            }
        }
    }
}
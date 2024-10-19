<?php

namespace Http\Forms;

use Core\Validator;

class AddressForm extends Form
{
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::string($this->attributes['street_address'], 3, 50)) {
            $this->errors['street_address'] = 'street_address';
        }

        if (!Validator::string($this->attributes['city'], 3, 50)) {
            $this->errors['city'] = "city";
        }

        if (!Validator::number($this->attributes['zip_code'])) {
            $this->errors['zip_code'] = "zip_code";
        }

        if (!Validator::string($this->attributes['province'], 3, 50)) {
            $this->errors['province'] = "province";
        }

        if (!Validator::string($this->attributes['country'], 3, 50)) {
            $this->errors['province'] = "province";
        }

        if (!Validator::number($this->attributes['is_default'], 0, 1)) {
            $this->errors['primary'] = "primary";
        }
    }
}
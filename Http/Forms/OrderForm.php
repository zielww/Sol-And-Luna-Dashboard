<?php

namespace Http\Forms;

use Core\Validator;

class OrderForm extends Form
{
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;

        if ($this->attributes['status']) {
            if (!Validator::string($this->attributes['status'], 3, 50)) {
                $this->errors['name'] = "status";
            }
        }

        if ($this->attributes['tracking_number']) {
            if (!Validator::string($this->attributes['tracking_number'], 3, 50)) {
                $this->errors['tracking_number'] = "Tracking Number";
            }
        }
    }
}
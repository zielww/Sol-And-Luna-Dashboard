<?php

namespace Core\Repository;

use Core\App;
use Core\Database;
use Core\Session;

class Addresses
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function store(array $attributes): void
    {
        $this->db->query('insert into addresses (user_id, street_address, city, province, zip_code, country, is_default) values (:user_id, :street_address, :city, :province, :zip_code, :country, :is_default)', [
            'user_id' => $attributes['user_id'],
            'street_address' => $attributes['street_address'],
            'city' => $attributes['city'],
            'province' => $attributes['province'],
            'zip_code' => $attributes['zip_code'],
            'country' => $attributes['country'],
            'is_default' => $attributes['is_default'],
        ]);

        Session::flash('success', 'Address added successfully!');
    }

    public function delete(string|int $address_id): void
    {
        $this->db->query('delete from addresses where address_id = :address_id', ['address_id' => $address_id]);
        Session::flash('success', 'Address  removed successfully!');
    }

    public function update(array $attributes): void
    {
        $this->db->query('UPDATE addresses SET street_address = :street_address, city = :city, province = :province, zip_code = :zip_code, country = :country, is_default = :is_default WHERE address_id = :address_id', [
            'address_id' => $attributes['address_id'],
            'street_address' => $attributes['street_address'],
            'city' => $attributes['city'],
            'province' => $attributes['province'],
            'zip_code' => $attributes['zip_code'],
            'country' => $attributes['country'],
            'is_default' => $attributes['is_default'],
        ]);

        Session::flash('success', 'Address updated successfully!');
    }
}
<?php
require_once('Crud.php');

class Client extends Crud
{

    public $table = 'mlab_client';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'name',
        'contact',
        'address',
        'postal_code',
        'email',
        'phone',
        'city_id'
    ];
}

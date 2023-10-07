<?php
require_once('Crud.php');

class Client extends Crud{

    public $table = 'client';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'nom',
        'adresse',
        'postal_code',
        'courriel',
        'phone',
        'naissance',
        'ville_id'
    ];

}


?>
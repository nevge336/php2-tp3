<?php
require_once('Crud.php');

class Sale extends Crud
{

    public $table = 'mlab_sale';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'name',
        'description',
        'cost',
        'price'
    ];
}

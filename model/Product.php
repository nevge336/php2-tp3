<?php
require_once('Crud.php');

class Product extends Crud
{
    public $table = 'mlab_product';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'name',
        'description',
        'cost',
        'price'
    ];
}

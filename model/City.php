<?php
require_once('Crud.php');

class City extends Crud{

    public $table = 'mlab_city';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'city'
    ];
}


?>

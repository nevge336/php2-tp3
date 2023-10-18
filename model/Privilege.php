<?php
require_once('Crud.php');

class Privilege extends Crud
{
    public $table = 'mlab_privilege';
    public $primaryKey = 'id';

    public $fillable = [

        'id',
        'privilege'

    ];
}

<?php
require_once('Crud.php');

class Logbook extends Crud
{

    public $table = 'mlab_logbook';
    public $primaryKey = 'id';

    public $fillable = [
        'id',
        'ip_address',
        'date',
        'username',
        'visited_url'
    ];
}

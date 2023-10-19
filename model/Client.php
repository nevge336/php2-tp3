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

    public function selectInnerJoin()
    {
        $sql = "SELECT mlab_client.id, name, contact, address, postal_code, email, phone, city FROM mlab_client
        inner join mlab_city 
        on mlab_client.city_id = mlab_city.id";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }


}

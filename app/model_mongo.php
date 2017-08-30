<?php 

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {

     //protected $connection = 'mongodb';
     protected $collection = 'users';

}


?>
<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class ServiceTranslation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = 'service_translations';

    protected $primaryKey = 'id';
}

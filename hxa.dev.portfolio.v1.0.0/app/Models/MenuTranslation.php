<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class MenuTranslation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = 'menu_translations';

    protected $primaryKey = 'id';
}

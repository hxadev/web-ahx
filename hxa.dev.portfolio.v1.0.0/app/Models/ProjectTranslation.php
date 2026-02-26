<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class ProjectTranslation extends Eloquent
{

    protected $connection = 'mongodb';
    protected $table = 'project_translations';

    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class ProjectDetailTranslation extends Eloquent
{

    protected $connection = 'mongodb';
    protected $table = 'project_detail_translations';

    protected $primaryKey = 'id';
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class PhraseTranslation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = 'phrase_translations';

    protected $primaryKey = 'id';
}

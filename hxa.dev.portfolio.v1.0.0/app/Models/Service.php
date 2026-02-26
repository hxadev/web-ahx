<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Service extends Eloquent implements TranslatableContract
{

    use Translatable;

    protected $connection = 'mongodb';
    protected $table = 'service';

    protected $primaryKey = 'id';

    public $translatedAttributes = ["title", "content"];
    public $translationModel;
    public $translationForeignKey;

    public $localeKey;
}

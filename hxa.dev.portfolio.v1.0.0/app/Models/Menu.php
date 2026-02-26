<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Menu extends Eloquent implements TranslatableContract
{

    use Translatable;

    protected $connection = 'mongodb';
    protected $table = 'menu';

    protected $primaryKey = 'id';

    public $translatedAttributes = ["name"];
    public $translationModel;
    public $translationForeignKey;

    public $localeKey;


}

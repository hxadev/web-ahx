<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;


class Phrase extends Eloquent implements TranslatableContract
{

    use Translatable;

    protected $connection = 'mongodb';
    protected $table = 'phrase';

    protected $primaryKey = 'id';


    public $translatedAttributes = ["content", "author"];
    public $translationModel;
    public $translationForeignKey;

    public $localeKey;
}

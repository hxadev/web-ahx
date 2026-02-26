<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use App\Models\ProjectDetail;

class Project extends Eloquent implements TranslatableContract
{
    use Translatable;

    protected $connection = 'mongodb';
    protected $table = 'project';

    protected $primaryKey = 'id';

    public $translatedAttributes = ["name", "type"];
    public $translationModel;
    public $translationForeignKey;

    public $localeKey;

    public function details()
    {
        return $this->hasOne(ProjectDetail::class, "_id", "project_detail_id");
    }
}

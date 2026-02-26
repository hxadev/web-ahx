<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use App\Models\Project;

class ProjectDetail extends Eloquent implements TranslatableContract
{
    use Translatable;

    protected $connection = 'mongodb';
    protected $table = 'project_detail';

    protected $primaryKey = 'id';

    public $translatedAttributes = ["description", "requirements", "overview", "challenge", "solution"];
    public $translationModel;
    public $translationForeignKey;

    public $localeKey;

    // public function project()
    // {
    //     return $this->belongsToMany(Project::class,null, 'id', 'project_id');
    // }
}

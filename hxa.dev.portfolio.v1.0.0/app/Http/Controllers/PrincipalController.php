<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\ProjectController;

class PrincipalController extends Controller
{
    private $yearBase, $yearsExperiencie, $plugin, $menu, $service, $phrase, $project;

    public function __construct()
    {
        $this->yearBase = 2017;
        $this->yearsExperiencie = date('Y') - $this->yearBase;
        $this->plugin = new PluginController();
        $this->menu = new MenuController();
        $this->service = new ServiceController();
        $this->phrase = new PhraseController();
        $this->project = new ProjectController();
    }

    public function index()
    {
        return view('index', [
            "template" => "principal",
            "title" => "Inicio",
            "experience" => $this->yearsExperiencie,
            "colorTheme" => $this->plugin->getColorTheme(),
            "typeTheme" => $this->plugin->getTypeTheme(),
            "menu" => $this->menu->getMenu(),
            "services" => $this->service->getServices(),
            "phrase" => $this->phrase->getRandomPhrase(),
            "projects" => $this->project->getAll()
        ]);
    }

    public function show(Project $project = null)
    {
        $result = null;
        if (!$project) {
            $result = Project::raw(function ($collection) {
                return $collection->aggregate(array(
                    array(
                        '$lookup' => array(
                            'from' => 'project_detail',
                            'localField' => 'project_id',
                            'foreignField' => 'id',
                            'as' => 'details'
                        )
                    )
                ));
            });
        } else {
            $result = Project::raw()->aggregate(array(
                array(
                    '$match' => 'id == ' + $project->id
                ),
                array(
                    '$lookup' => array(
                        'from' => 'project_detail',
                        'localField' => 'project_id',
                        'foreignField' => 'id',
                        'as' => 'details'
                    )
                )
            ));
        }

        return json_decode($result, true);
    }
}

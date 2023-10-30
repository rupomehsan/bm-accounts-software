<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModelingDirectory extends Command
{
    protected $signature = 'make:module {module_name}';
    protected $description = 'Create a folder and files in the app directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $moduleName = $this->argument('module_name');
        $table = Str::plural((Str::snake($this->argument('module_name'))));

        $baseDirectory = app_path("Modules/" . $moduleName);
        $actionsDirectory = $baseDirectory . '/Actions';
        if (!File::isDirectory($baseDirectory)) {
            File::makeDirectory($baseDirectory);
        }
        if (!File::isDirectory($actionsDirectory)) {
            File::makeDirectory($actionsDirectory);
        }
        $actionFiles = ['All.php',  'Store.php', 'Show.php', 'Update.php', 'Delete.php',  'Validation.php'];
        foreach ($actionFiles as $file) {
            if ($file == 'All.php') {
                File::put($actionsDirectory . '/' . $file, all($moduleName));
            }
            if ($file == 'Store.php') {
                File::put($actionsDirectory . '/' . $file, store($moduleName));
            }
            if ($file == 'Show.php') {
                File::put($actionsDirectory . '/' . $file, show($moduleName));
            }
            if ($file == 'Update.php') {
                File::put($actionsDirectory . '/' . $file, update($moduleName));
            }
            if ($file == 'Delete.php') {
                File::put($actionsDirectory . '/' . $file, delete($moduleName));
            }
            if ($file == 'Validation.php') {
                File::put($actionsDirectory . '/' . $file, validation($moduleName));
            }
        }
        File::put($baseDirectory . '/Controller.php', controller($moduleName));
        File::put($baseDirectory . '/Model.php', model($moduleName));
        File::put($baseDirectory . '/create_' . $table . '_table.php', migration($moduleName));
        File::put($baseDirectory . '/Route.php', routeContent($moduleName));
        File::put($baseDirectory . '/api.http', api($moduleName));
    }
}

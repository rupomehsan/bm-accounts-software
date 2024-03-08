<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModelingDirectory extends Command
{
    protected $signature = 'make:module {module_name} {--vue}';
    protected $description = 'Create a folder and files in the app directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $moduleName = $this->argument('module_name');
        $ViewModuleName = $this->argument('module_name');
        $withVue = $this->option('vue');
        $baseDirectory = app_path("Modules/");
        $format_dir = explode('/', $moduleName);
        $module_dir = null;

        if (count($format_dir) > 1) {
            $moduleName = end($format_dir);
            array_pop($format_dir); //if do not make last name folder
            $module_dir = implode('/', $format_dir);
            if (!File::isDirectory($baseDirectory . $module_dir)) {
                mkdir($baseDirectory . $module_dir, 0777, true);
            }
            $baseDirectory = $baseDirectory . $module_dir . '/';
        }

        $table = Str::plural((Str::snake($moduleName)));

        if (!File::isDirectory($baseDirectory . $moduleName)) {
            File::makeDirectory($baseDirectory . $moduleName);
        }



        $actionsDirectory = $baseDirectory . $moduleName . '/Actions';
        if (!File::isDirectory($actionsDirectory)) {
            File::makeDirectory($actionsDirectory);
        }

        $actionFiles = ['All.php', 'BulkActions.php', 'Store.php', 'Show.php', 'Update.php', 'Delete.php',  'Validation.php', 'Seeder.php'];

        if ($module_dir != null) {
            $module_name = $module_dir . '/' . $moduleName;
        } else {
            $module_name = $moduleName;
        }

        // dd($module_name);
        foreach ($actionFiles as $file) {
            if ($file == 'All.php') {
                File::put($actionsDirectory . '/' . $file, all($module_name));
            }
            if ($file == 'BulkActions.php') {
                File::put($actionsDirectory . '/' . $file, bulkActions($module_name));
            }
            if ($file == 'Store.php') {
                File::put($actionsDirectory . '/' . $file, store($module_name));
            }
            if ($file == 'Show.php') {
                File::put($actionsDirectory . '/' . $file, show($module_name));
            }
            if ($file == 'Update.php') {
                File::put($actionsDirectory . '/' . $file, update($module_name));
            }
            if ($file == 'Delete.php') {
                File::put($actionsDirectory . '/' . $file, delete($module_name));
            }
            if ($file == 'Validation.php') {
                File::put($actionsDirectory . '/' . $file, validation($module_name));
            }
            if ($file == 'Seeder.php') {
                File::put($actionsDirectory . '/' . $file, seeder($module_name));
            }
        }

        File::put($baseDirectory . $moduleName . '/Controller.php', controller($module_name));
        File::put($baseDirectory . $moduleName . '/Model.php', model($module_name, $moduleName));
        File::put($baseDirectory . $moduleName . '/create_' . $table . '_table.php', migration($moduleName));
        File::put($baseDirectory . $moduleName . '/Route.php', routeContent($module_name, $moduleName));
        File::put($baseDirectory . $moduleName . '/api.http', api($moduleName));
        File::put($baseDirectory . $moduleName . '/Seeder.php', seeder($module_name, $moduleName));


        if ($withVue) {

            $role = 'bm_manager';
            $vueDirectory = resource_path("js/backend/views/pages/{$role}/management/");
            $vue_format_dir = explode('/', $ViewModuleName);
            $vue_module_dir = null;

            if (count($vue_format_dir) > 1) {

                $ViewModuleName = end($vue_format_dir);
                array_pop($vue_format_dir);
                $vue_module_dir = implode('/', $vue_format_dir);

                if (!File::isDirectory($vueDirectory . $vue_module_dir)) {
                    mkdir($vueDirectory . $vue_module_dir, 0777, true);
                }

                $vueDirectory = $vueDirectory . $vue_module_dir . '/';
            }

            if (!File::isDirectory($vueDirectory . $ViewModuleName)) {
                File::makeDirectory($vueDirectory . $ViewModuleName);
            }


            $ViewactionsDirectory = $vueDirectory . $ViewModuleName . '/setup';
            if (!File::isDirectory($ViewactionsDirectory)) {
                File::makeDirectory($ViewactionsDirectory);
            }

            // dd($module_name);

            File::put($vueDirectory  . $ViewModuleName . '/All.vue', viewAll($ViewModuleName));
            File::put($vueDirectory  . $ViewModuleName . '/Form.vue', viewForm($ViewModuleName));

            $setupActionFiles = ['form_fields.js',  'index.js', 'Layout.vue', 'routes.js', 'store.js'];
            foreach ($setupActionFiles as $file) {
                if ($file == 'form_fields.js') {
                    File::put($ViewactionsDirectory . '/' . $file, ViewFormField($ViewModuleName));
                }
                if ($file == 'index.js') {
                    File::put($ViewactionsDirectory . '/' . $file, ViewIndex($ViewModuleName));
                }
                if ($file == 'Layout.vue') {
                    File::put($ViewactionsDirectory . '/' . $file, ViewLayout($ViewModuleName));
                }
                if ($file == 'routes.js') {
                    File::put($ViewactionsDirectory . '/' . $file, ViewRoute($ViewModuleName));
                }
                if ($file == 'store.js') {
                    File::put($ViewactionsDirectory . '/' . $file, ViewStore($ViewModuleName));
                }
            }
        }
    }
}

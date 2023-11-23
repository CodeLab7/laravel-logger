<?php

namespace Codelab7\LaravelLogger\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class Cl7Observation extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cl7-observation {modelName}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() {
        $modelName = $this->arguments()['modelName'];

        $this->info('Generating Observation file for ' . $modelName);
        $view = view('laravel-logger::codelab7-logger',compact('modelName'));
        Artisan::call("make:observer {$modelName}Observer --model={$modelName}");

        $fileName = app_path()."/Observers/{$modelName}Observer.php";
        $file = File::exists($fileName);
        if($file){
            File::put($fileName,$view);
            $this->info($modelName . 'Observation file Created. Just put below lines in EventServiceProvider.php
            protected $observers = [
                '.$modelName.'::class => ['.$modelName.'Observer::class],
            ];');
        }else{
            $this->info($modelName . 'File creation has failed. Please check if Laravel has sufficient permissions to create the file.');
        }

    }

}

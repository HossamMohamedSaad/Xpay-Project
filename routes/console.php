<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



Schedule::command('reports:monthly')
    ->monthlyOn(1, '00:10')   
    ->withoutOverlapping();

Schedule::command('app:check-clients-subscription')
        ->dailyAt('01:00') 
        ->withoutOverlapping();
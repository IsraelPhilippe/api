<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('CollectGames', function () {
    $q = new \App\Jobs\CollectGames();
    $this->comment($q->handle());
})->purpose('Display an inspiring quote')->hourly();

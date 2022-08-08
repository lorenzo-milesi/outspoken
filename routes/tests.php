<?php

use Illuminate\Support\Facades\Route;
use IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Controllers\SearchController;

Route::post('/api/searches', [SearchController::class, 'create']);

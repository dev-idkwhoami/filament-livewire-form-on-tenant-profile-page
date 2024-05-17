<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::get('phpinfo', fn () => phpinfo());

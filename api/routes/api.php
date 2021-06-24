<?php

use Illuminate\Support\Facades\File;

/* find all routes.php files */
$routeFiles = collect(File::allFiles(app_path('Modules')))
    ->filter(fn($file) => $file->getFilename() === 'routes.php')
    ->map(fn($file) => $file->getPathname());

/* load all route files */
$routeFiles->each(fn($path) => require $path);

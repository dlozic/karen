<?php

/* load all actions */
$currentFolder = dirname(__FILE__);
$files = array_diff(scandir($currentFolder), ['..', '.', 'index.php']);

$actions = [];
foreach ($files as $file) {
    $tmp = include($file);
    $actions = [...$actions, ...$tmp];
}

return collect($actions);
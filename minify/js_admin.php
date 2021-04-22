<?php

require_once  './../../../../../vendor/autoload.php';

use MatthiasMullie\Minify;

$minifier = new Minify\JS();

$base_path = '../admin-html/js';
$files = array(
    'libs/jquery-3.4.1.min.js',
    'common.js',
    'aisb_setup.js',
    'aisb_create.js',
    'aisb_adminjs.js',
    'config.js'
    );
$minifiedPath = '../admin/js/ais-admin.min.js';

foreach ($files as $file){
    if ($base_path !=''){
        $path = $base_path . '/'. $file;
        $minifier->add($path);
    }else{
        $minifier->add($file);
    }
}

$minifier->minify($minifiedPath);

// or just output the content
echo $minifier->minify();

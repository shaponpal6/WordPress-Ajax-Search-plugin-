<?php

require_once  './../../../../../vendor/autoload.php';

use MatthiasMullie\Minify;

$minifier = new Minify\JS();

$base_path = '../html/botjs';
$files = array(
    'jquery.min.js',
    'fuse.min.js',
    'jsCookie.js',
    'Aisb.js',
    'elasticlunr.js',
    'pagination.js',
    'axios.min.js',
    'common.js',
    'eCommerce.js',
    'help.js',
    'knowledgeBase.js',
    'customBot.js',
    'actionBot.js',
    'template.js',
//    'fuseSearch.js',
    'searchEngine.js',
    'controller.js',
    'searchBot.js'
    );
$minifiedPath = '../public/js/wpartificial-search.min.js';

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

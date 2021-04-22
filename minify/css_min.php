<?php

require_once 'autoload.php';

use MatthiasMullie\Minify;

$minifier = new Minify\CSS();

$base_path = '../ai-search/css';
$files = array('search.css');
$minifiedPath = '../ai-search/css/minify.css';

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

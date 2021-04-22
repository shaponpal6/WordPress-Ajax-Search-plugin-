<?php

require_once 'autoload.php';

use MatthiasMullie\Minify;

$minifier = new Minify\CSS();

$base_path = '../ai-search/admin/css';
$files = array('aisb-admin.css','setup.css','create.css');
$minifiedPath = '../ai-search/admin/css/ais-admin.min.css';

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

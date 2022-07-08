<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$endpoint = new FieldsBuilder('page_endpoint', [
    'position' => 'acf_after_title',
    'hide_on_screen'    => [
        'the_content'
    ]
]);

$endpoint
    ->setLocation('page_template', '==', 'views/template-endpoint.blade.php');
  
$endpoint
    ->addText('title_h1')
    ->addWysiwyg('text')
    ->addLink('btn_black')->setWidth('50')
    ->addLink('btn_border')->setWidth('50')
   

;return $endpoint;
<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$discover = new FieldsBuilder('discover');

$discover
    ->addImage('image')->setWidth('50')
    ->addGroup('text')->setWidth('50')
        ->addText('title')
        ->addTextarea('text')
        ->addText('popup_btn_text')
        ->addUrl('vimeo_link')
    ->endGroup();

return $discover;
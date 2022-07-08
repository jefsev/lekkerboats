<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header = new FieldsBuilder('header');

$header
    ->setLocation('options_page', '==', 'header-instellingen');
  
$header
    ->addLink('header_button')

;return $header;

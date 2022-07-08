<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$footer = new FieldsBuilder('footer');

$footer
    ->setLocation('options_page', '==', 'footer-instellingen');
  
$footer
    ->addRepeater('footer_links')
        ->addLink('link')
    ->endRepeater()
            


;return $footer;

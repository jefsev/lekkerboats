<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$front_page = new FieldsBuilder('front_page', [
    'position' => 'acf_after_title',
    'hide_on_screen'    => [
        'the_content'
    ]   
]);

// Load partials
$booking_form = get_field_partial('partials.booking-form');
$faq = get_field_partial('partials.faq');
$discover = get_field_partial('partials.discover');
$map = get_field_partial('partials.google-map');

$front_page
    ->setLocation('page_type', '==', 'front_page');

$front_page
    ->addGroup('page_hero')
        ->addGroup('left')->setWidth('50')
            ->addText('title_h1')
            ->addText('title_h2')
            ->addTextarea('text')
            ->addMessage('Buttons','Use following options in link fields to scroll to elements: #map-element, #booking-element, #faq-element, #discover-element')
            ->addLink('btn_black')->setWidth('50')
            ->addLink('btn_border')->setWidth('50')
        ->endGroup()
        ->addGroup('right')->setWidth('50')
            ->addImage('image')
        ->endGroup()
    ->endGroup()
    ->addFlexibleContent('flexible', ['button_label' => 'Add Content Row'])
        ->addLayout($map)
        ->addLayout($booking_form)
        ->addLayout($faq)
        ->addLayout($discover) 
    ->endFlexibleContent()
    
;return $front_page;
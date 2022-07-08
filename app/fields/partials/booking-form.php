<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$booking_form = new FieldsBuilder('booking_form');

$booking_form
    ->addGroup('booking_form')->setWidth('50')
        ->addText('title')
        ->addTextarea('text')
        ->addText('form_shortcode')
    ->endGroup()
    ->addGroup('booking_video')->setWidth('50')
        ->addFile('video_mp4')
    ->endGroup();

return $booking_form;
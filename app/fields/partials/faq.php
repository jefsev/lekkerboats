<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$faq = new FieldsBuilder('faq');

$faq
    ->addText('title')
    ->addRepeater('faqs')
        ->addText('question')
        ->addWysiwyg('answer')
    ->endRepeater();

return $faq;
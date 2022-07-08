<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$google_map = new FieldsBuilder('google_map');

$google_map
    ->addText('map_title')
    ->addWysiwyg('map_intro')
    ->addRepeater('locations_dates')
        ->addText('latitude-langitude', ['instructions' => 'Go to google maps and right click on a location on the map and click the first option with the lat-lang numbers. Paste it here',])
        ->addText('location_name')
        ->addText('location_date')
    ->endRepeater()
    ->addLink('btn_black')

;return $google_map;
<?php

/***
 * getting category name
 */
function getCategoryName($catId) {
    $data    = \App\blogCategory::whereId($catId)->first();
    return $data['name'];
}

/**
 * function for aprint
 */
function aprint($data) {
       echo "<pre>";
       print_r($data);
       exit;
       die();
}

function getAdsDetails($id) {
     return $details  = \App\ads::whereId($id)->first();
}

function allCategories() {
    $data   =  \App\blogCategory::get();
    return $data;
}




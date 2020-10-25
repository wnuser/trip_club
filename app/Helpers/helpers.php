<?php

/***
 * getting category name
 */
function getCategoryName($catId) {
    $data    = \App\blogCategory::whereId($catId)->first();
    return $data['name'];
}




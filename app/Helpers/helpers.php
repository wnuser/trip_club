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


function getCategories($selected  = null)
{
    echo '<select name="category" id="" class="form-control">
           <option value="">Choose Category</option>';
    $allCategories   =  \App\blogCategory::get();
    foreach ($allCategories as $key => $value) {
        # code...
        if($value['id']  == $selected) {
            echo "<option value='".$value['id']."' selected>".$value['name']."</option>";
        } else {
            echo "<option value='".$value['id']."'>".$value['name']."</option>";
        }
    }
    echo '</select>';
}



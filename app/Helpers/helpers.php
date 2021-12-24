<?php
function convert_date($value)
{
    return date('d M Y', strtotime($value));
}

function different_date($value1, $value2)
{
    $date = date('Ymd', strtotime($value1));
    $toDate = date('Ymd', strtotime($value2));

    return $toDate - $date;
}

function late_date($value1)
{
    $date = date('Ymd', strtotime($value1));
    $dateNow = date('Ymd');

    $check = $dateNow - $date;

    return $check;
}

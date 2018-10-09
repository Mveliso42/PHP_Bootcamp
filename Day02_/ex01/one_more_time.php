#!/usr/bin/php
<?php
    date_default_timezone_set('Jahannesburg/South Africa');

    $month = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December");

    $week = array(
        1 => "Sunday",
        2 => "Monday",
        3 => "Tuesday",
        4 => "Wednesday",
        5 => "Thursday",
        6 => "Friday",
        7 => "Saturday");

    if ($argc < 2)
        exit();

    $date = explode(" ", $argv[1]);
    if (count($date) != 5 ||
        preg_match("/^[1-9]$|0[1-9]|[1-2][0-9]|3[0-1]$/", $date[1], $date[1]) === 0 ||
        preg_match("/^[0-9]{4}$/", $date[3], $date[3]) === 0 ||
        preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $date[4], $date[4]) === 0) {
        echo "Wrong Format\n";
        exit();
    }
    $date[0] = array_search(lcfirst($date[0]), $week);
    $date[2] = array_search(lcfirst($date[2]), $month);
    if ($date[0] === false || $date[2] === false){
        echo "Wrong Format\n";
        exit();
    }

    $time = mktime($date[4][1], $date[4][2], $date[4][3], $date[2], $date[1][0], $date[3][0]);
    if (date( "N", $time) == $date[0])
        echo $time."\n";
    else
        echo "Wrong Format\n";
    ?>
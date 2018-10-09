#!/usr/bin/php
<?php
    function ft_split($str){
        $return = array_filter(explode(' ', $str));
        sort($return);
		return ($return);
	}
?>

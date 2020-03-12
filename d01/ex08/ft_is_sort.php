#!/usr/bin/php
<?php
    function ft_is_sort($array)
    {
        $sorted_array = $array;
        sort($sorted_array);
        if ($sorted_array === $array)
            return true;
        return false;
    }
?>
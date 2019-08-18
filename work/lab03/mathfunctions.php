<?php
    function factorial ($n)
    {
        $result = 1;
        $factor = $n;
        while ($factor > 1)
        {
            $result *= $factor;
            $factor--;
        }

        return $result;
    }
?>

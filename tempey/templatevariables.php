<?php
    $data = [];
    
    function SetVar($key, $value)
    {
        global $data;
        $data[$key] = $value;
    }

    function GetVar($key)
    {
        global $data;
        return $data[$key];
    }
?>
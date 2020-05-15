<?php
    $data = array();
    
    function SetTemplateVar($key, $value)
    {
        global $templateData;
        $templateData[$key] = $value;
    }

    function GetTemplateVar($key)
    {
        global $templateData;
        return $templateData[$key];
    }
?>
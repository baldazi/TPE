<?php
namespace App\Core;

class Form{
    
    /**
     * 
     */
    static function validate(array $form, array $champs){
        $result = true;
        foreach($champs as $champ){
            if(!isset($form[$champ])||empty($form[$champ])){
                $result = false;
            }
            return $result;
        }
    }

    static function isURL(string $url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
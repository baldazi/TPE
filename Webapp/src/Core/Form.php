<?php
namespace App\Core;

class Form{
    
    /**
     * 
     */
    static function validate(array $form, array $champs): bool
    {
        $result = true;
        foreach($champs as $champ){
            if(empty($form[$champ])){
                $result = false;
            }
        }
        return $result;
    }

    static function isURL(string $url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    static function isEmail(string $url){
        return filter_var($url, FILTER_VALIDATE_EMAIL);
    }

    // Fonction pour vérifier le format de la date
    function isDate($date) {
        $regex_full = '/^\d{8}T\d{6}$/'; // Format YYYYMMDDTHHMMSS
        $regex_date_only = '/^\d{8}$/';  // Format YYYYMMDD
        return preg_match($regex_full, $date) || preg_match($regex_date_only, $date);
    }
}
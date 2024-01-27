<?php

namespace App\Models;

class UserModel extends Model
{

    use ModelBase;

    private string $sql = "
    CREATE TABLE IF NOT EXISTS `User` (
        `id` INTEGER PRIMARY KEY AUTOINCREMENT,
        `pseudo` TEXT NOT NULL,
        `email` TEXT NOT NULL,
        `password` TEXT NOT NULL
    );
    ";

    public function setSession(){
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['pseudo'] = $this->pseudo;
    }

    //Registers
    function register() {
        if(!$this->findBy(['email'=>$this->email]) && !$this->findBy(['pseudo'=>$this->pseudo])){
            $this->create();
            return true;
        }else{
            return false;
        }        
    }
}

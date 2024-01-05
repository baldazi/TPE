<?php

namespace App\Models;

class UserModel extends Model
{

    protected $id;
    protected $pseudo;
    protected $email;
    protected $password;

    private $sql = "
    CREATE TABLE IF NOT EXISTS `User` (
        `id` INTEGER PRIMARY KEY AUTOINCREMENT,
        `pseudo` TEXT NOT NULL,
        `email` TEXT NOT NULL,
        `password` TEXT NOT NULL
    );
    ";
    function __construct()
    {
        $this->table = str_replace('Model', '', str_replace(__NAMESPACE__.'\\','',__CLASS__));
    }

    public function migrate(){
        $this->execute($this->sql);
    }

    function findSomeOne($id){
        return $this->q("SELECT * FROM {$this->table} WHERE email=? OR pseudo=?", [$id, $id])->fetch();
    }

    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getEmail(){
        return $this->email;
    }

    //setter
    public function setId($id){
        $this->id = $id;
    }

    public function setPassword($pwd){
        $this->password = $pwd;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function setEmail($email){
        $this->email = $email;
    }

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

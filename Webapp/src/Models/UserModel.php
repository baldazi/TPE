<?php

namespace App\Models;

class UserModel extends Model
{

    use ModelBase;

    public function setSession(){
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['pseudo'] = $this->pseudo;
    }

    static function disconnect(): void
    {
        unset( $_SESSION['user']);
    }

    //Registers
    function register() {
        if(!$this->findBy(['email'=>$this->email]) && !$this->findBy(['pseudo'=>$this->pseudo])){
            $this->password = md5($this->password);
            $this->create();
            return true;
        }else{
            return false;
        }        
    }

    function findSomeOne($id){
        return $this->q("SELECT * FROM {$this->table} WHERE email=? OR pseudo=?", [$id, $id])->fetch();
    }
}

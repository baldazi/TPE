<?php

namespace App\Models;

class UserModel extends Model
{

    use ModelBase;

    public function setSession($session = [])
    {
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['lastname'] = $this->lastname;
        $_SESSION['user']['firstname'] = $this->firstname;
        $_SESSION['user']['pseudo'] = $this->pseudo;

        foreach ($session as $key => $value) {
            $_SESSION['user'][$key] = $value;
        }
    }

    static function updateSession($session = [])
    {
        foreach ($session as $key => $value) {
            $_SESSION['user'][$key] = $value;
        }
    }

    static function disconnect(): void
    {
        unset($_SESSION['user']);
    }

//Registers
    function register()
    {
        if (!$this->findBy(['email' => $this->email]) && !$this->findBy(['pseudo' => $this->pseudo])) {
            $this->password = md5($this->password);
            $this->create();
            return true;
        } else {
            return false;
        }
    }

    function findSomeOne($id)
    {
        // Exécute la requête pour récupérer l'utilisateur et son thème
        $user = $this->q("SELECT User.*, UserTheme.name AS skin FROM {$this->table}
                     JOIN UserTheme ON User.ThemeID = UserTheme.id
                     WHERE User.email=? OR User.pseudo=?",
            [$id, $id])->fetch();

        return $user;
    }
}

<?php
namespace App\Controllers;

class SettingController extends Controller{
    public function index()
    {
        $this->render("setting/index.tpl");
    }

    public function profil()
    {
        $this->render("setting/profil.tpl");
    }

    public function theme()
    {
        $this->render("setting/theme.tpl");
    }

}
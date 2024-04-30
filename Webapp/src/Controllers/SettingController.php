<?php
namespace App\Controllers;

use App\Models\UserThemeModel;

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
        $themes = UserThemeModel::getColors();
        $this->render("setting/theme.tpl", compact('themes'));
    }

}
<?php
namespace App\Controllers;

use App\Models\NewsletterModel;
use App\Models\UserThemeModel;

class NewsletterController extends Controller{
    public function id($id)
    {
        $model = new NewsletterModel();
        $newsletter = $model->findBy(["uuid"=>$id], true);
        $this->render("newsletter/index.tpl", compact("newsletter"));
    }
}
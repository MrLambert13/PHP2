<?php
/**
 * Created by Artem Manchenkov
 * artyom@manchenkoff.me
 * manchenkoff.me © 2018
 */

namespace app\controllers;

use app\models\User;
use core\base\Controller;

class SiteController extends Controller
{
    public function index() {
        $user = new User();

        if ($this->request->isPost()) {
            if ($user->load($this->request->post())) {
                $user->save();

                var_dump($user);
            } else {
                echo 'NOT LOADED';
            }
        }

        $regUser = User::all(
            User::find()
                ->where('id = :id')
                ->setParameter(':id', 2)
        );

       /* $user->id = 10;
        $user->login = 'testtest';

        if ($user->validate()) {
            echo 'OK';
        } else {
            var_dump($user->errors);
        }*/

        return $this->render('index');
    }
}
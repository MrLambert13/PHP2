<?php
/**
 * Created by PhpStorm.
 * User: Lam_1
 * Date: 25.11.2018
 * Time: 20:31
 */

namespace app\controllers;


use core\base\Controller;

class LoginController extends Controller {

    private $_userName;

    public function login()
    {
        $this->checkUser();
        if (!isset($this->_userName)) {
            return $this->render('login');
        } else {
            $this->request->redirect("account");
        }
    }

    private function checkUser()
    {
        if ($this->request->isPost()) {
            $this->_userName = $this->request->post('user');
            $this->request->session('user', $this->_userName);
        }
    }

    public function account()
    {
        return $this->render('account', [
                'name' => $this->request->session('user'),
            ]);
    }

}
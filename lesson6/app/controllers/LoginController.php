<?php
/**
 * Created by PhpStorm.
 * User: Lam_1
 * Date: 25.11.2018
 * Time: 20:31
 */

namespace app\controllers;


use core\base\Controller;
use core\base\View;
use core\Request;
use app\models\User;

class LoginController extends Controller
{

    private $_userName;

    public function __construct(Request $request, View $view) {
        parent::__construct($request, $view);
        //запись посещенной страницы в сессию
        $_SESSION['URI'][] = $_SERVER['REDIRECT_URL'];

    }

    public function login() {
        if (!$this->request->post('user')) {
            return $this->render('login');
        } else {
            if ($this->checkUser()) {
                $this->request->redirect("account");
            } else {
                return $this->render('login');
            }

        }
    }

    private function checkUser() {
        $this->_userName = $this->request->post('user');
        $regUser = User::one(
            User::find()
                ->where('login = :login')
                ->setParameter(':login', $this->_userName)
        );
        if ($regUser) {
            $this->request->session('user', $this->_userName);
            return true;
        }
        return false;
    }

    public function account() {
        return $this->render('account', [
            'name' => $this->request->session('user'),
            //последние пять посященных страниц
            'uri' => array_slice($_SESSION['URI'], -5),
        ]);
    }

}
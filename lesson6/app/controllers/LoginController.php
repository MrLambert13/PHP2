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
use app\models\Product;

class LoginController extends Controller
{

    private $_userName;

    public function __construct(Request $request, View $view) {
        parent::__construct($request, $view);
        //запись посещенной страницы в сессию
        $_SESSION['URI'][] = $_SERVER['REDIRECT_URL'];

    }

    public function login() {
        if (!($this->isLoggedUser() || $this->request->post('user'))) {
            echo 1;
            return $this->render('login');
        } else {
            if ($this->checkUser()) {
                $this->request->redirect("account");
            } else {
                return $this->render('login');
            }

        }
    }

    /**
     * Проверка авторизован ли пользователь
     * @return bool
     */
    private function isLoggedUser() {
        $auth = $this->request->post('auth');
        print_r($auth);
        return isset($auth['login']);
    }

    public function logout() {
        session_destroy();
        $this->request->redirect("/");
    }

    private function checkUser() {
        $this->_userName = $this->request->post('user');
        $regUser = User::one(
            User::find()
                ->where('login = :login')
                ->setParameter(':login', $this->_userName)
        );
        if ($regUser) {
            $auth = $this->request->session('auth');
            $auth['id'] = $regUser->id;
            $auth['login'] = $regUser->login;
            $auth['userName'] = $regUser->username;
            $this->request->session('auth', $auth);
            return true;
        }
        return false;
    }

    /**
     * Отображение содержимого корзины
     */
    public function showcart() {
        $orderItems = [];
        $cart = $this->request->session('cart');

        // грузим элементы из сессии, если есть (с подгрузкой названия из БД)
        if (isset($cart)) {
            foreach ($cart['items'] as $item) {
                $product = new Product();
                $product = Product::one(
                    Product::find()
                        ->where('id = :id')
                        ->setParameter(':id', $item['id'])
                );
                //                var_dump($product);
                $orderItems[] = [
                    'id' => $item['id'],
                    'name' => $product->name,
                    'quantity' => $item['quantity'],
                ];
            }
        }

        return $this->render('cart', [
            'cart' => $orderItems,
        ]);

    }

    public function account() {
        $auth = $this->request->session('auth');
        return $this->render('account', [
            'name' => $auth['login'],
            //последние пять посященных страниц
            'uri' => array_slice($_SESSION['URI'], -5),
        ]);
    }

}
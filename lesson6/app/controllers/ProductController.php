<?php
/**
 * Created by PhpStorm.
 * User: Lam_1
 * Date: 28.11.2018
 * Time: 21:30
 */

namespace app\controllers;


use app\models\Product;
use core\base\Controller;

class ProductController extends Controller
{
    public function index() {
        $data = Product::all();
        return $this->render('product', [
            'data' => $data,
        ]);
    }

    public function one($id) {
        $data = Product::one(
            Product::find()
                ->where('id = :id')
                ->setParameter(':id', $id)
        );

        $_SESSION['URI'][] = $_SERVER['REDIRECT_URL'];

        return $this->render('one', [
            'data' => $data,
        ]);
    }

    public function add() {

        if ($this->request->isAjax()) {
            $id = $this->request->post('id');
            $quantity = $this->request->post('quantity');
            if ($this->request->session('cart')) {
                $exist = -1;

                // увеличиваем количество, если товар уже есть
                foreach ($_SESSION['cart']['items'] as $index => $item) {
                    if ($item['id'] == $id) {
                        $exist = $index;
                    }
                }

                if ($exist != -1) {
                    $_SESSION['cart']['items'][$exist]['quantity'] += $quantity;

                    $this->renderJson([
                        'result' => 'OK',
                        'status' => 'update',
                        'errors' => null,
                        'prod' => $_SESSION['cart'],
                    ]);
                } else {
                    $_SESSION['cart']['items'][] = [
                        'id' => $id,
                        'quantity' => $quantity,
                    ];

                    $this->renderJson([
                        'result' => 'OK',
                        'status' => 'new',
                        'errors' => null,
                        'prod' => $_SESSION['cart'],
                    ]);
                }
            } else {
                // иначе просто добвляем в массив
                $_SESSION['cart']['items'][] = [
                    'id' => $id,
                    'quantity' => $quantity,
                ];

                $this->renderJson([
                    'result' => 'OK',
                    'status' => 'new',
                    'errors' => null,
                    'prod' => $_SESSION['cart'],
                ]);
            }
//            session_destroy();

        }
    }

    function renderJson($data) {
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
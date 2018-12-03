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

    /**
     * Добавление товара в корзину
     */
    public function add() {
        $cart = $this->request->session('cart');
        if ($this->request->isAjax()) {
            $id = $this->request->post('id');
            $quantity = $this->request->post('quantity');

            //Если корзина существует уже, то предположим что индекс товара = -1
            if ($cart) {
                $exist = -1;

                //если товар уже есть в корзине ищем его индекс
                foreach ($cart['items'] as $index => $item) {
                    if ($item['id'] == $id) {
                        $exist = $index;
                    }
                }

                // Если нашли, то увеличиваем количество
                if ($exist != -1) {
                    $cart['items'][$exist]['quantity'] += $quantity;

                    // Сообщаем что запись обновлена
                    $this->renderJson([
                        'result' => 'OK',
                        'status' => 'update',
                        'errors' => null,
                        'prod' => $cart,
                    ]);
                } else {
                    //иначе добавляем новый элемент в массив
                    $cart['items'][] = [
                        'id' => $id,
                        'quantity' => $quantity,
                    ];
                    //сообщаем что запись новая
                    $this->renderJson([
                        'result' => 'OK',
                        'status' => 'new',
                        'errors' => null,
                        'prod' => $cart,
                    ]);
                }
            } else {
                // иначе если корзина ещё не создана, создаем и начинаем добавлять товары
                $cart['items'][] = [
                    'id' => $id,
                    'quantity' => $quantity,
                ];

                //сообщаем что запись новая
                $this->renderJson([
                    'result' => 'OK',
                    'status' => 'new',
                    'errors' => null,
                    'prod' => $cart,
                ]);
            }
        }
        //сохраняем  результаты в сессию
        $this->request->session('cart', $cart);
    }

    function renderJson($data) {
        header('Content-type: application/json');
        echo json_encode($data);
    }
}
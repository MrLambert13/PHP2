<?php
namespace app\models;

use core\base\ActiveRecord;

/**
 * Class User
 * @package app\models
 *
 * @property int    $id
 * @property string $login
 * @property string $password
 * @property int    $last_access
 * @property string $username
 */
class User extends ActiveRecord
{
    protected function validationRules() {
        //        return [
        //            'id' => NumberValidator::class,
        //            'login' => LoginValidator::class,
        //        ];
    }

}
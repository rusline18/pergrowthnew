<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $lastname;
    public $floor;
    public $data;
    public $country;
    public $region;
    public $city;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', "message"=>"Вы пропустили поле"],
            // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', "message"=>"Вы пропустили поле"],
            ['email', 'email', "message"=>"Вы ввели не правильный email адрес"],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже занят'],

            ['password', 'required', "message"=>"Вы пропустили поле"],
            ['password', 'string', 'min' => 6],

            ['lastname', 'trim'],
            ['lastname', 'required', "message"=>"Вы пропустили поле"],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->lastname = $this->lastname;
        $user->data = $this->data;
        $user->floor = $this->floor;
        $user->country = $this->country;
        $user->region = $this->region;
        $user->city = $this->city;

        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}

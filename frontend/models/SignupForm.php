<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $alamat;
    public $provinsi;
    public $notelfon;
    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => "Harap isi username anda"],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'Username ini sudah ada yang punya.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message'=> "Harap ini email anda"],
            ['email', 'email', 'message' => "Email tidak valid."],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'Email ini sudah ada yang punya.'],

            ['password', 'required', 'message' => "Harap isi password anda"],
            ['password', 'string', 'min' => 6, 'message' => 'Password minimal 6 huruf'],

            ['alamat', 'required', 'message' => "Harap isi alamat anda"],
            ['alamat', 'string'],

            ['provinsi', 'required', 'message' => 'Harap isi form ini'],
            ['provinsi', 'string'],

            ['notelfon', 'required', 'message' => "Harap isi no telfon anda"],
            ['notelfon', 'number'],

            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verifikasi Kode',
            'alamat' => 'Alamat Rumah',
            'provinsi' => 'Provinsi',
            'notelfon' => 'No Telfon',
            'password' => 'Password',
            'email' => 'Email',
            'username' => 'Username'
        ];
    }
    
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->alamat = $this->alamat;
        $user->provinsi = $this->provinsi;
        $user->notelfon = $this->notelfon;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();

    }
}

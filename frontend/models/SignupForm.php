<?php
namespace frontend\models;

use common\models\Profile;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $nif;
    public $telemovel;
    public $morada;
    public $is_admin;
    public $is_funcionario;
    public $is_cliente;
    public $id_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

           [['nome', 'nif', 'telemovel', 'morada', 'id_user'], 'required'],
            [['nif', 'telemovel', 'is_admin', 'is_funcionario', 'is_cliente', 'id_user'], 'integer'],
            [['nome', 'morada'], 'string', 'max' => 80],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save(false);

        $profile = new Profile();
        $profile->nome = $this->nome;
        $profile->nif = $this->nif;
        $profile->telemovel = $this->telemovel;
        $profile->morada = $this->morada;
        $profile->is_admin = 0;
        $profile->is_funcionario = 0;
        $profile->is_cliente = 1;
        $profile->id_user = $user->id;
        $profile->save(false);

        return $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}

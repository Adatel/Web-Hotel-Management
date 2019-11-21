<?php
namespace frontend\models;

use common\models\Profile;
use Yii;
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
        /*var_dump($this->nome);
        die();*/
        /*if (!$this->validate()) {
            return null;
        }*/

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save(false);
            $user->generateEmailVerificationToken();
            $user->save();

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
            $profile->save();

            // the following three lines were added:
           /* $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('author');
            $auth->assign($authorRole, $user->getId());
*/
            //return $user;
            return $this->sendEmail($user);
        //}

        //return null;
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

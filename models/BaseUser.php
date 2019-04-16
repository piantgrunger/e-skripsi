<?php
namespace app\models;

use yii\web\User as ParentUser;
use yii\helpers\Url;

class BaseUser extends ParentUser
{

    protected function renewAuthStatus()
    {

        $this->sso(); // check sso cookie and do anything required after the cookie is authenticated here
    
        parent::renewAuthStatus();
    
        // and do any other post auth stuffs here if required
    }

    private function sso()
    {
        if (Url::base() !== 'skripsi.uinsby.ac.id') {
              $this->loginUrl=['site/login'];
        } else {
            $this ->loginUrl = 'http://ctrl.uinsby.ac.id';
            $cookies = $this->$app->request->cookies;
            $username = $cookies->getValue('nip');
            if ($username) {
                $par    = base64_decode(base64_decode($username));
                $datax  = explode('|', $par);
                $nip    = $datax[0];
                $user = User::find()->where('username'=>$nip)->one();
                if($user) {
                   $user=new User;
                   $user->username = $nip;
                   $user->email=$nip.'@uinsby.ac.id';
                   $user->password = md5($nip); 
                   $user->save(false);

                }
                $this->login($user);
            }

        }
    }
}

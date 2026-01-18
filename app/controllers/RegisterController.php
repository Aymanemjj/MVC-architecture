<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;

class RegisterController{

    public function registerUser(){
        
        $user = new User();
        $request = new Request();
        $body = $request->getBody();
        if($this->isValidPasswordSignUp($body)){
            $user->setters($body);
        }
        if(!$this->isValidFirstname($user)){
            return false;
        }if(!$this->isValidEmailSignUp($user)){
            return false;
        }
        $user->save();
    }

        private function isValidFirstname(object $user): bool
    {
        $pattern = "/^(.*?)\s([\wáâàãçéêíóôõúüÁÂÀÃÇÉÊÍÓÔÕÚÜ]+\-?'?\w*\.?)$/u";

        if(!preg_match($pattern, $user->getFirstname())){
            return false;
        }else if(!preg_match($pattern, $user->getLastname())){
            return false;
        }


        return true;
    }


    private function isValidEmailSignUp(object $user): bool
    {
        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $object = $user->find();
        if (is_null($object)) {
            return true;
        } else {
            return false;
        }
    }

    private function isValidPasswordSignUp(array $body): bool
    {
        if($body['password']===$body['confirmPassword']){
            return true;
        }
        return false;
    }

}
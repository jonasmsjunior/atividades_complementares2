<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 15/05/2016
 * Time: 17:09
 */

namespace SISAC\OAuth;


use Illuminate\Support\Facades\Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
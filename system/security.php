<?php

class security
{

    public static function xss_protection($data)
    {
        return str_replace(['"', "'", "<", ">", '\\', "/"], '', $data);
    }

    public function create_password($password)
    {
        return bin2hex(password_hash($password, PASSWORD_BCRYPT));
    }

    public function verify_password($password, $hash)
    {
        return (password_verify($password, hex2bin($hash)) ? 1 : 0);
    }

}

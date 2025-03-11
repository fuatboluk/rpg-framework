<?php

class security
{

    public static function xss_protection($data)
    {
        return str_replace(['"', "'", "<", ">", '\\', "/"], '', $data);
    }

    public static function xss_detection($data)
    {
        $xss = stripos(" ".$data, "<script");

        if ($xss == true)
        {
            return 1;
        }
        else
        {
            return $data;
        }
    }

    public static function shell_detection($data)
    {
        $php = stripos(" ".$data, "<?php");

        if ($php == true)
        {
            return 1;
        }
        else
        {
            return $data;
        }
    }

    public static function create_password($password)
    {
        return bin2hex(password_hash($password, PASSWORD_BCRYPT));
    }

    public static function verify_password($password, $hash)
    {
        return (password_verify($password, hex2bin($hash)) ? 1 : 0);
    }

    public static function fix_username($username)
    {
        return strtolower(preg_replace("@[^a-z0-9]+@i", "", $username));
    }

}

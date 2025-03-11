<?php

class user extends model
{

    public function get($email, $column)
    {
        return $this->where("email", "=", $email)->select("users", $column)->$column;
    }

    public function set($email, $column, $value)
    {
        return ($this->update("users", [$column => $value], ["email" => $email]) ? 1 : 0);
    }

    public function check($username)
    {
        return ($this->where("username", "=", $username)->select("users")->username ? 1 : 0);
    }

    public function info($data)
    {
        if (stripos($data, "@") == true)
        {
            return $this->where("email", "=", $data)->select("users");
        }
        else
        {
            return $this->where("username", "=", $data)->select("users");
        }
    }

    public function remove($email)
    {
        return ($this->delete("users", ["email" => $email]) ? 1 : 0);
    }

    public function count($where = null)
    {
        if ($where != null)
        {
            return $this->fetchColumn("users", $where);
        }
        else
        {
            return $this->fetchColumn("users");
        }
    }

    public function register($email, $password)
    {
        $array = [
            "username" => "user".rand(111111, 999999),
            "email" => $email,
            "password" => security::create_password($password),
            "register_date" => settings::$date." ".settings::$time
        ];

        return ($this->insert("users", $array) ? 1 : 0);
    }
    
}

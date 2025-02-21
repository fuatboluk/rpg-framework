<?php

class user extends model
{

    public function get($email, $column)
    {
        echo $this->where("email", "=", $email)->select("users", $column)->$column;
    }

    public function set($email, $column, $value)
    {
        return ($this->update("users", [$column => $value], ["email" => $email]) ? 1 : 0);
    }

    public function info($email)
    {
        return $this->where("email", "=", $email)->select("users");
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

    // register
    
}

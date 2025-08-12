<?php

class controller extends rpg
{

    /*
    protected $id;

    protected $session;

    protected $user;
    */

    public $data;

    public function __construct()
    {
        /*
        $this->session = $this->module("session");
        $this->id = session_id();

        $this->session->control($this->id);
        $this->user = $this->model("user");
        */

        $this->data = new stdClass;
    }

}

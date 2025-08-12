<?php

class index extends controller
{

    public function main()
    {
        $this->data->title = "RPG Framework";
        $this->data->application = "rpg";
        $this->data->version = "1.0";

        $this->data->phpver = phpversion();
        $this->data->software = $_SERVER["SERVER_SOFTWARE"];

        $this->view("index", $this->data);
    }

}
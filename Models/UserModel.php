<?php

class UserModel
{
    private $user_lists;

    public function __construct()
    {
        global $users;
        $this->user_lists = $users;
    }

    public function getAllUsers(){
        return $this->user_lists;
    }

    public function login(){
        
    }
}

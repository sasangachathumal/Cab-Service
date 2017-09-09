<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {
    private $email;
    private $name;
    private $password;
    private $phone;
    private $address;
    private $type;
    private $active;

    public function __construct(array $data) {
        if (isset($data['email']) && isset($data['name']) && isset($data['phone']) && isset($data['address']) && isset($data['password']) && isset($data['type'])) {
            $this->email = $data['email'];
            $this->name = $data['name'];
            $this->phone = $data['phone'];
            $this->address = $data['address'];
            $this->password = $data['password'];
            $this->type = $data['type'];
        } else {
            $this->email = NULL;
            $this->name = NULL;
            $this->phone = NULL;
            $this->address = NULL;
            $this->password = NULL;
            $this->type = NULL;
        }
    }

    // Setters and getters defined here as well
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getPhone() {
        return $this->phone;
    }
    
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getActive() {
        return $this->active;
    }
    
    public function setActive($active) {
        $this->active = $active;
    }
    
}
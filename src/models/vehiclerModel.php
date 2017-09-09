<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Vehicle {
    private $number;
    private $type;
    private $noOfSeats;
    private $driverEmail;

    public function __construct(array $data) {
        if (isset($data['number']) && isset($data['type']) && isset($data['noOfSeats']) && isset($data['driverEmail'])) {
            $this->number = $data['number'];
            $this->type = $data['type'];
            $this->noOfSeats = $data['noOfSeats'];
            $this->driverEmail = $data['driverEmail'];
        } else {
            $this->number = NULL;
            $this->type = NULL;
            $this->noOfSeats = NULL;
            $this->driverEmail = NULL;
        }
    }

    // Setters and getters defined here as well
    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
    }
    
    public function getNoOfSeats() {
        return $this->noOfSeats;
    }
    
    public function setNoOfSeats($noOfSeats) {
        $this->noOfSeats = $noOfSeats;
    }
    
    public function getDriverEmail() {
        return $this->driverEmail;
    }
    
    public function setDriverEmail($driverEmail) {
        $this->driverEmail = $driverEmail;
    }
    
}
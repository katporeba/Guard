<?php

class Shelter {
    private $phoneNumber;
    private $city;
    private $street;
    private $streetNumber;
    private $postalCode;
    private $website;
    private $openFromDay;
    private $openToDay;
    private $openFromHour;
    private $openToHour;
    private $id_User;


    public function __construct($phoneNumber, $city, $street, $streetNumber, $postalCode, $website, $id_User) {
        $this->phoneNumber = $phoneNumber;
        $this->city = $city;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->postalCode = $postalCode;
        $this->website = $website;
//        $this->openFromDay = $openFromDay;
//        $this->openToDay = $openToDay;
//        $this->openFromHour = $openFromHour;
//        $this->openToHour = $openToHour;

        $now = new DateTime();
        $timestring = $now->format('h:i:s');

        $this->openFromDay = 'monday';
        $this->openToDay = 'friday';
        $this->openFromHour = $timestring;
        $this->openToHour = $timestring;
        $this->id_User = $id_User;
    }

    public function getIdUser()
    {
        return $this->id_User;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getOpenFromDay()
    {
        return $this->openFromDay;
    }

    public function getOpenToDay()
    {
        return $this->openToDay;
    }

    public function getOpenFromHour()
    {
        return $this->openFromHour;
    }


    public function getOpenToHour()
    {
        return $this->openToHour;
    }

    public function setIdUser($id_User): void
    {
        $this->id_User = $id_User;
    }





}
<?php


namespace App;


class Address
{
    public function __construct(private object $p)
    {
    }

    public function toAddressString(): string
    {
        $address = [
            $this->p->city,
            $this->p->street,
            $this->p->house,
            $this->p->apartment,
        ];

        return implode(" ", $address);
    }

    public function getFullName()
    {
        return $this->p->second_name . ' ' . $this->p->first_name;
    }

}
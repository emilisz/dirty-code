<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function __construct(private User $user)
    {
    }

    public function addSum($sum) {
        return $this->getBalance()->addSum($sum);
    }

    public function getBalance()
    {
        return $this->getBalance()->sum;
    }
}

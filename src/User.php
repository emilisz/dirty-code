<?php

declare(strict_types=1);

namespace App;

use App\auth\Login;
use App\auth\PasswordRestore;
use App\auth\Register;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

/**
 * This class is example of dirty code
 */
class User extends Model
{
    private object $p;

    private function getP(): object
    {
        return $this->p;
    }


    public function login($email, $password): bool
    {
        return (new Login($email, $password))->login();
    }

    public function register($email, $password)
    {
        return (new Register($email, $password))->register();
    }

    public function restorePassword($email)
    {
        return (new PasswordRestore($email))->restore();
    }

    #[Pure] public function getAddressString()
    {

        return (new Address($this->getP()))->toAddressString();


    }

    #[Pure] public function getFullName()
    {
        return (new Address($this->getP()))->getFullName();
    }


    public function addBalance($sum)
    {
        return (new Balance($this))->addSum($sum);
    }


    public function getBillingStatistics()
    {
        return (new BillingHistory($this))->getRecords();
    }


    public function getPaymentsStatistics()
    {
        return (new Payments($this))->getRecords();
    }

}
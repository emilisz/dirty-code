<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingHistory extends Model
{
    public function __construct(private User $user)
    {
    }

    public function getRecords()
    {
        return $this->where('user_id', $this->user->id)
            ->groupBy('created_at')
            ->get();
    }
}
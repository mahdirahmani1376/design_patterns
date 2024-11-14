<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $user_id
 * @property $amount
 * @property $years_to_payback
 */
class Loan extends Model
{
    protected $fillable = [
        "user_id",
        "amount",
        "years_to_payback",
    ];


}

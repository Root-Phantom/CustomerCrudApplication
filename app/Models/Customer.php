<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'image',
        'first_name',
        'last_name',
        'email',
        'phone',
        'bank_account_number',
        'about'
    ];
    use HasFactory;
    use SoftDeletes;
}

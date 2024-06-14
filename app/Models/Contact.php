<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'tax_code', 'product_name', 'subject', 'phone', 'email', 'address', 'message', 'type', 'file'
    ];
}

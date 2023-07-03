<?php

namespace App\Models\Tickets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user_tickets';
    protected $fillable = 
    [
        'email',
        'senha',

    ];
}

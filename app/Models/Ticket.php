<?php

namespace App\Models;

use App\Models\Technical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'assunto',
        'texto',
        'email',
        'technical_id'
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Technical::class,'foreign_key');
    }

}

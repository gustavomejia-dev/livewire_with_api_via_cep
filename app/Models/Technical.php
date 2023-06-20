<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technical extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'setor',
        'technical_email',
        
    ];

    public function tickets():HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}

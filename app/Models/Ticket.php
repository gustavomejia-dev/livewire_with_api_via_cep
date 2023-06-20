<?php

namespace App\Models;

use App\Models\Technical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function technical():BelongsTo{
        return $this->belongsTo(Technical::class);
    }


}

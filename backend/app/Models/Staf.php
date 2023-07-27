<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staf extends Model
{
    protected $table = 'staf';
    public function divisi():BelongsTo
    {
        return $this->belongsTo(Divisi::class,'id_divisi');
    }
}

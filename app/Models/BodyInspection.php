<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyInspection extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function jurisdiction()
    {
        return $this->belongsTo(Jurisdiction::class);
    }

    public function inspectorate()
    {
        return $this->belongsTo(Inspectorate::class);
    }
}

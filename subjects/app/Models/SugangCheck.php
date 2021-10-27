<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SugangCheck extends Model
{
    use HasFactory;
    protected $table='sugang_checks';

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}

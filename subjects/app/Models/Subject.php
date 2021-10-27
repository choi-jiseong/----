<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name','grade', 'explanation'];

    public function likes_viewers(){
        return $this->belongsToMany(User::class, 'sugang_checks', 'subject_id', 'user_id', 'id', 'id', 'users');
    }
}

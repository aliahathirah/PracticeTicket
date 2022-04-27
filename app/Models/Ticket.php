<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory;  // Factory, it has "fake" data
    use SoftDeletes;
    protected $fillable = ['title','description','attachment','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

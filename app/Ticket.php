<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'deadline', 'assigned_to', 'user_id', 'status'];

    public function user() {
      return $this->belongsTo(User::class);
    }
}

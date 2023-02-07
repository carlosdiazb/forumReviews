<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = "comment";
    
    protected $fillable = ['text'];
    
    function review() {
        return $this->belongsTo('App\Models\Review', 'idreview');
    }
    
    function user() {
        return $this->belongsTo('App\Models\User', 'iduser');
    }
}

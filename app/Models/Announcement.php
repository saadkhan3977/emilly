<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcement';
    protected $guarded = [];

    public function branches(){
        return $this->hasOne(Branch::class, 'id' ,'branch_id');
    }
}



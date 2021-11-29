<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'role_user';
    public $timestamps = FALSE;

    public function user(){
        return $this->belongsTo(User::class);
    }
}

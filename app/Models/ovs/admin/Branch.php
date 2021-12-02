<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    
   // protected $primaryKey = 'brCode';

    protected $fillable = [
        'brCode',
        'brName',
        'isLocked',
    ];
}

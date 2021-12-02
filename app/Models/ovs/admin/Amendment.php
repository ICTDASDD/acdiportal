<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amendment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'votingPeriodID',
        'amendmentNo',
        'articleNo',
        'amendmentDetails',
    ];
}

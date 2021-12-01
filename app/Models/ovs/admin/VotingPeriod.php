<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotingPeriod extends Model
{
    use HasFactory;

    protected $primaryKey = 'votingPeriodID';

    protected $fillable = [
        'votingPeriodID',
        'cy',
        'startDate',
        'endDate',
        //'isDefault',
    ];
}

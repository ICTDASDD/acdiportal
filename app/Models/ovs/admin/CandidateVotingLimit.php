<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateVotingLimit extends Model
{
    use HasFactory;

    protected $primaryKey = 'candidateVotingLimitID';

    protected $fillable = [
        'candidateVotingLimitID',
        'votingPeriodID',
        'candidateTypeID',
        'count',
    ];
}

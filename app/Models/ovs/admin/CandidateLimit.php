<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateLimit extends Model
{
    use HasFactory;

    protected $primaryKey = 'candidateLimitID';

    protected $fillable = [
        'candidateLimitID',
        'votingPeriodID',
        'candidateTypeID',
        'count',
    ];
}

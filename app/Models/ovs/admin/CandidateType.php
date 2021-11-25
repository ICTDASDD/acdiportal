<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateType extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'candidateTypeID';

    protected $fillable = [
        'candidateTypeID',
        'candidateTypeName',
    ];
}

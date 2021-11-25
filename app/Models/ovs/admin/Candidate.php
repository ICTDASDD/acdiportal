<?php

namespace App\Models\ovs\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $primaryKey = 'candidateID';

    protected $fillable = [
        'profilePicture',
        'candidateID',
        'lastName',
        'firstName',
        'middleName',
        'information1',
        'information2',
        'candidateFor',
    ];
}

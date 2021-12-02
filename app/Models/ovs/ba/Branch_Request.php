<?php

namespace App\Models\ovs\ba;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_Request extends Model
{
    use HasFactory;
    protected $table = 'branch_request';
    protected $fillable = [
        'brCode',
        'user_id',
        'request_type',
        'request_info',
        'status',
        'elecom_status',
        'canvas_status',
    ];
}

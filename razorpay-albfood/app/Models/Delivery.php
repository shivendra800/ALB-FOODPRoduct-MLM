<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table= 'deliveries';
    protected $fillable = [
        'name',
        'phone',
        'id_proof',
        'id_proof_no',
        'email',
        'password',
        'id_image',
        'image',
        'allot_pinecode',
        'status',
        'state',
        'district',
        'division',
        'region',
        'block',
        
    ];
}

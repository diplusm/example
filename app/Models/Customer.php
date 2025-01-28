<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $connection = 'CRM';

    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email'
    ];




}

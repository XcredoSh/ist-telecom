<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'last_name', 'first_name', 'sur_name', 'position', 'passport_serial', 'passport_number', 'phone', 'address', 'company_id'
    ];

//    /**
//     * Get the post that owns the comment.
//     */
//    public function company()
//    {
//        return $this->belongsTo(Company::class);
//    }
}

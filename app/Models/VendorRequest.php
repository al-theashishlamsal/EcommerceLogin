<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // ID of the user making the request
        'status',  // Status of the request (e.g., 'pending', 'approved', 'rejected')
        // Add other attributes here as needed
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // Add the hidden attributes here
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // Add the casts for attributes here
    ];
}

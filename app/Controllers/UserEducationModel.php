<?php

namespace App\Models;
use CodeIgniter\Model;

class UserEducationModel extends Model
{
    protected $table = 'user_education'; // Table name
    protected $primaryKey = 'id'; // Primary key

    protected $allowedFields = [
        'user_id',  // Foreign key (links to users table)
        'degree',
        'university',
        'passing_year'
    ];

    // Optional: Auto timestamps (if needed)
    protected $useTimestamps = false;
}

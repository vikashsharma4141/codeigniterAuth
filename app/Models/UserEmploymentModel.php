<?php

namespace App\Models;
use CodeIgniter\Model;

class UserEmploymentModel extends Model
{
    protected $table = 'user_employment'; // Table name
    protected $primaryKey = 'id'; // Primary key

    protected $allowedFields = [
        'user_id',  // Foreign key (links to users table)
        'company_name',
        'position',
        'start_date',
        'end_date'
    ];

    // Optional: Auto timestamps (if needed)
    protected $useTimestamps = false;
}

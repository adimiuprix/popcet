<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'balance', 'ip_address', 'referral_code', 'reff_by', 'energy', 'last_claim'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

}

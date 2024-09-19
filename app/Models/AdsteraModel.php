<?php

namespace App\Models;

use CodeIgniter\Model;

class AdsteraModel extends Model
{
    protected $table            = 'adsteras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['type', 'meta_data'];
}

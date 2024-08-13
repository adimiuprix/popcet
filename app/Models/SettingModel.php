<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['sitename', 'keyword', 'description', 'reward_rate', 'reward_reff', 'free_energy'];

    public function energyRecharge():string
    {
        $builder = $this->db->table('settings')->select('free_energy');
        $result = $builder->get()->getRow();
        return $result ? (string)$result->free_energy : '';
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'date', 'total',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getOne($orderId)
    {
        return $this->where('id', $orderId)->first();
    }
    
    public function getAll($providerId = null, $minDate = null, $maxDate = null)
    {
        $query = null;

        if ($providerId !== null) {
            $query = $this->where('id', function(BaseBuilder $baseBuilder){
                return $baseBuilder->select('phone_id')->from('references')->where('provider_id', $providerId);
            });
        }

        if ($maxDate !== null && $query !== null) {
            $query = $query->where('date <=', $maxDate);
        } else if ($maxDate) {
            $query = $this->where('date <=', $maxDate);
        }

        if ($minDate !== null && $query !== null) {
            $query = $query->where('date >=', $minDate);
        } else if ($minDate) {
            $query = $this->where('date >=', $minDate);
        }

        if ($query !== null) {
            $query = $query->getAll();
        } else {
            $query = $this->getAll();
        }
    }
}

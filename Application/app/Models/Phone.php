<?php

namespace App\Models;

use CodeIgniter\Model;

class Phone extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'phones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'brand', 'model', 'description', 'cores', 'ram', 'battery', 'price', 'stock',
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

    public function getOne($phoneId)
    {
        return $this->where('id', $phoneId)->first();
    }

    public function getAll($providerId = null, $brand = null, $maxCores = null, $minCores = null, $maxRam = null, $minRam = null, $maxBattery = null, $minBattery = null, $maxPrice = null, $minPrice = null) // price from phones table 
    {
        $query = null;

        if ($providerId !== null) {
            $query = $this->where('id', function(BaseBuilder $baseBuilder){
                return $baseBuilder->select('phone_id')->from('references')->where('provider_id', $providerId);
            });
        }

        if ($brand !== null && $query !== null) {
            $query = $query->like('brand', $brand);
        } else if ($brand) {
            $query = $this->like('brand', $brand);
        }

        if ($maxCores !== null && $query !== null) {
            $query = $query->where('cores <=', $maxCores);
        } else if ($maxCores) {
            $query = $this->where('cores <=', $maxCores);
        }

        if ($minCores !== null && $query !== null) {
            $query = $query->where('cores >=', $minCores);
        } else if ($minCores) {
            $query = $this->where('cores >=', $minCores);
        }

        if ($maxRam !== null && $query !== null) {
            $query = $query->where('ram <=', $maxRam);
        } else if ($maxRam) {
            $query = $this->where('ram <=', $maxRam);
        }

        if ($minRam !== null && $query !== null) {
            $query = $query->where('ram >=', $minRam);
        } else if ($minRam) {
            $query = $this->where('ram >=', $minRam);
        }

        if ($maxBattery !== null && $query !== null) {
            $query = $query->where('battery <=', $maxBattery);
        } else if ($maxBattery) {
            $query = $this->where('battery <=', $maxBattery);
        }

        if ($minBattery !== null && $query !== null) {
            $query = $query->where('battery >=', $minBattery);
        } else if ($minBattery) {
            $query = $this->where('battery >=', $minBattery);
        }

        if ($maxPrice !== null && $query !== null) {
            $query = $query->where('price <=', $maxPrice);
        } else if ($maxPrice) {
            $query = $this->where('price <=', $maxPrice);
        }

        if ($minPrice !== null && $query !== null) {
            $query = $query->where('price >=', $minPrice);
        } else if ($minPrice) {
            $query = $this->where('price >=', $minPrice);
        }

        if ($query !== null) {
            return $query->findAll();
        } else {
            return $this->findAll();
        }
    }

    public function reference($phoneId, $providerId, $price) {
        return $this->db->table('references')->insert([
            'phone_id' => $phoneId,
            'provider_id' => $providerId,
            'price' => $price
        ]);
    }
}

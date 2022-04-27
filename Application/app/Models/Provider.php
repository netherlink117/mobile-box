<?php

namespace App\Models;

use CodeIgniter\Model;

class Provider extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'providers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'contact',
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

    public function getOne($providerId)
    {
        return $this->where('id', $providerId)->first();
    }
    
    public function getAll($phoneId = null)
    {
        $query = null;

        if ($phoneId !== null) {
            $query = $this->join('references', 'references.provider_id = providers.id')->where('phone_id', $phoneId);
        }

        if ($query !== null) {
            return $query->findAll();
        } else {
            return $this->findAll();
        }
    }
}

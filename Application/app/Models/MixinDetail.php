<?php

namespace App\Models;

use CodeIgniter\Model;

class MixinDetail extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mixindetails';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'phone', 'price', 'quantity',
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

    public function getOne($detailId)
    {
        return $this->where('id', $detailId)->first();
    }
    
    public function getAll($headerType = null, $headerId = null)
    {
        $query = null;

        if ($headerType !== null) {
            $query = $query->where('type', $headerType);
        }

        if ($headerId !== null && $query !== null) {
            $query = $query->where('header_id', $headerId);
        } else if ($minDate) {
            $query = $this->where('header_id', $headerId);
        }

        if ($query !== null) {
            $query = $query->getAll();
        } else {
            $query = $this->getAll();
        }
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'parent_id'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

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

    public function getCategoryWithParent(){
        $builder = $this->db->table('categories');
        $builder->select('categories.id, categories.parent_id, categories.nom, parent.nom as parent_name');
        $builder->join('categories as parent', 'categories.parent_id = parent.id', 'left');
        $builder->orderBy('categories.parent_id', 'asc');
        $query = $builder->get();
        return $query->getResultArray();



    }

public function getSubCategorie(){
    $this->db->table('categories');
    $data= $this->findAll();
    $subCategData =[];
    for ($i=0; $i <count($data) ; $i++) { 
        if ($data[$i]['parent_id'] !=0) {
            $subCategData[] = $data[$i];
        }
    }

    return $subCategData;
}
}

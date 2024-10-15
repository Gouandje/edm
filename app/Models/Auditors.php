<?php

namespace App\Models;

use CodeIgniter\Model;

class Auditors extends Model
{
    protected $table            = 'auditors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nom_prenom',
        'adresse',
        'telephone',
        'avatar',
        'niveau',
        'genre',
        'user_id',
        'niveau_id',
        'created_at',
        'updated_at'
    ];

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

    public function getAllAditors()
    {
        $builder = $this->db->table($this->table);
        $builder->select('auditors.*, niveaux.name');
        $builder->join('niveaux', 'niveaux.id = auditors.niveau_id');
        $query = $builder->get();

        return $query->getResult();
    }

    public function getSingleAuditor($userId)
    {
        $builder = $this->db->table($this->table);
        $builder->select('auditors.*, users.login');
        $builder->join('users', 'users.id = auditors.user_id');
        $builder->where('auditors.user_id', $userId);
        $query = $builder->get();

        return $query->getRowArray();
    }

    public function getAuditors($userid)
    {
        $this->db->table('auditors');
        $this->select('auditors.*');
        $this->where('user_id', $userid);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function getSingleAuditorWithNiveau($userId)
    {
        $builder = $this->db->table($this->table);
        $builder->select('auditors.*, niveaux.name');
        $builder->join('niveaux', 'niveaux.id = auditors.niveau_id');
        $builder->where('auditors.user_id', $userId);
        $query = $builder->get();

        return $query->getRowArray();
    }
    
    public function findAuditorByUserId($userId)
    {
        return $this->where('user_id', $userId)->first(); 
    }
}

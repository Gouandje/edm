<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'login',
        'mot_de_passe',
        'role',
        'status',
        'is_online',
        'lastlogged_at',
        'last_submit_date'
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

    public function getRole($userId)
    {
        return $this->select('*')
                    ->where('users.id', $userId)
                    ->get()
                    ->getRowArray()['role'];
    }

    public function getAllAuditors()
    {
        return $this->select('*')
                    ->where('users.role', 'auditeur')
                    ->get()
                    ->getResultArray();
    }

    public function getAllFormateur()
    {
        return $this->select('*')
                    ->where('users.role','formateur')
                    ->get()
                    ->getResultArray();
    }

    public function getAllAdmin()
    {
        return $this->select('*')
                    ->where('users.role', 'administrateur')
                    ->get()
                    ->getResultArray();
    }
    
    public function getUsersAuditor()
    {
        return $this->select('users.*, auditors.*')
                    ->join('auditors', 'auditors.user_id = users.id')
                    ->findAll();
    }
}

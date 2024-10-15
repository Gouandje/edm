<?php

namespace App\Models;

use CodeIgniter\Model;

class Professors extends Model
{
    protected $table            = 'professors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nom_prenom',
        'adresse',
        'telephone',
        'date_naiss',
        'avatar',
        'discipline_id',
        'genre',
        'description',
        'status',
        'user_id',
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

    public function getAllProfs()
    {
        $builder = $this->db->table($this->table);
        $builder->select('professors.*, disciplines.nom');
        $builder->join('disciplines', 'disciplines.id = professors.discipline_id');
        $query = $builder->get();

        return $query->getResult();
    }

    public function getSingleProf($userId)
    {
        $builder = $this->db->table($this->table);
        $builder->select('professors.*, users.login');
        $builder->join('users', 'users.id = professors.user_id');
        $builder->where('professors.user_id', $userId);
        $query = $builder->get();

        return $query->getRowArray();
    }
}

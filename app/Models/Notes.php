<?php

namespace App\Models;

use CodeIgniter\Model;

class Notes extends Model
{
    protected $table            = 'notes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'auditor_id',
        'week',
        'note',
        'created_at',
        'updated_at',
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
    
    public function getNotesAuditor($startDate, $endDate)
    {
        return $this->select('notes.*, users.id as userid, users.role, auditors.nom_prenom, auditors.id as auditorId')
                    ->join('auditors', 'auditors.id = notes.auditor_id')
                    ->join('users', 'auditors.user_id = users.id')
                    ->where('notes.created_at >=', $startDate)
                    ->where('notes.created_at <=', $endDate)
                    ->findAll();
    }

    public function getNotebyAuditor($id){
        return $this->select('notes.*')
                   ->where('notes.auditor_id', $id)
                    ->findAll();
    }
}

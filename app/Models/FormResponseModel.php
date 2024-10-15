<?php

namespace App\Models;

use CodeIgniter\Model;

class FormResponseModel extends Model
{
    protected $table            = 'form_responses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'morning_prayer_days', 'average_prayer_hours', 'prayer_time_for_mentees',
        'simple_reading_count', 'text_study_count', 'theme_study_count',
        'sermons_listened_count', 'character_trait_worked_on', 'tithe_given',
        'soul_won', 'person_invited', 'mentees_condition', 'role_explained',
        'department_prayer_time', 'department_difficulties', 'internship_tasks',
        'internship_learning'
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
}

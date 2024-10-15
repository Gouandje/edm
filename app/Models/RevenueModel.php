<?php

namespace App\Models;

use CodeIgniter\Model;

class RevenueModel extends Model
{
    protected $table            = 'revenues';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['month', 'year', 'revenue'];

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

    public function getMonthRevenue($date)
    {
        // Récupère le chiffre d'affaires du mois donné
        $revenue = $this->where('month', $date)->get()->getRowArray();
        return $revenue ? $revenue['revenue'] : 0;
    }

    public function updateMonthRevenue($date, $revenue)
    {
        // Met à jour le chiffre d'affaires du mois donné
        $this->where('month', $date)->set('revenue', $revenue)->update();
    }

    public function getYearRevenue($year)
    {
        // Récupère le chiffre d'affaires de l'année donnée
        $revenue = $this->selectSum('revenue')->where('year', $year)->get()->getRowArray();
        return $revenue ? $revenue['revenue'] : 0;
    }

    public function updateYearRevenue($year, $revenue)
    {
        // Met à jour le chiffre d'affaires de l'année donnée
        $this->where('year', $year)->set('revenue', $revenue)->update();
    }
}

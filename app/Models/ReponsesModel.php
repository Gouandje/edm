<?php

namespace App\Models;

use CodeIgniter\Model;

class ReponsesModel extends Model
{
    protected $table            = 'reponses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'question_id',
        'response',
        'created_at',
        'updated_at',
        'week',
        'status'

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

    public function getResponsesWithUsersAndQuestions()
    {
        return $this->select('reponses.*, auditors.nom_prenom, questions.question, questions.question_type')
                    ->join('auditors', 'auditors.user_id = reponses.user_id')
                    ->join('questions', 'questions.id = reponses.question_id')
                    ->where('reponses.status', null)
                    ->findAll();
    }

    public function getResponsesWithUsersAndQuestionsByAuditor($id)
    
    {
    //     var_dump($id);
    // die();
        return $this->select('reponses.*, auditors.nom_prenom, questions.question, questions.question_type')
                    ->join('auditors', 'auditors.user_id = reponses.user_id')
                    ->join('questions', 'questions.id = reponses.question_id')
                    ->where('reponses.user_id', $id)
                    ->where('reponses.status', null)
                    ->findAll();
    }
    
    

    
    public function getResponsesWithUsersAndQuestionsAndNotes()
    {
        return $this->select('notequestions.*, reponses.*, auditors.nom_prenom, questions.question, questions.question_type')
                    ->join('auditors', 'auditors.user_id = reponses.user_id')
                    ->join('questions', 'questions.id = reponses.question_id')
                    ->join('notequestions', 'notequestions.reponse_id = reponses.id')
                    ->where('reponses.status', 'noté')
                    ->findAll();
    }

    // Fonction pour obtenir les réponses avec les utilisateurs et les questions entre deux dates
    public function getResponsesWithUsersAndQuestionsExportation($startDate, $endDate)
    {
        return $this->select('reponses.*, auditors.nom_prenom, questions.question, questions.question_type')
                    ->join('auditors', 'auditors.user_id = reponses.user_id')
                    ->join('questions', 'questions.id = reponses.question_id')
                    ->where('reponses.created_at >=', $startDate)
                    ->where('reponses.created_at <=', $endDate)
                    ->findAll();
    }

    public function getFirstResponseDate()
    {
        return $this->select('created_at')
                    ->orderBy('created_at', 'ASC')
                    ->first();
    }
    
     public function getLastSubmissionDate($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->first();
    }
    
    // Méthode pour mettre à jour le statut des réponses

    public function updateResponseStatus($idUser, $responseIds)
    {
        return $this->whereIn('id', $responseIds)
                    ->set(['status' => 'noté'])
                    ->where('user_id', $idUser)
                    ->update();
    }
}

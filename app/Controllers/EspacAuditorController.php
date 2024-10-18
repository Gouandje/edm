<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\QuestionnairesModel;
use App\Models\QuestionsModel;
use App\Models\Auditors;
use App\Models\Niveaux;
use App\Models\Notes;


class EspacAuditorController extends BaseController
{
    public function index()
    {
        $auditorModel = new Auditors();
        $niveaumodel = new Niveaux();
        $note_model = new Notes();

        $session = session();

        $data['auditor'] = $auditorModel->getSingleAuditorWithNiveau($session->get('id'));
        $data['niveaux'] = $niveaumodel->findAll();
        $questionmodel = new QuestionsModel();

        $data['questions'] = $questionmodel->getWithQuestionnaire();
        $data['notes'] = $note_model->getNotebyAuditor($data['auditor']['id']);
        // var_dump($data['notes']);
        // die();

        $data['title'] = 'Tableau Auditeur';
        return view('backend/espaceauditor/profil_auditor', $data);
    }

    
}

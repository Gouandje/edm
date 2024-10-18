<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\FormResponseModel;
use App\Models\Niveaux;
use App\Models\Disciplines;
use App\Models\QuestionnairesModel;
use App\Models\QuestionsModel;
use App\Models\Auditors;
use App\Models\ReponsesModel;
use App\Models\UserModel;
use App\Models\NoteQuestionModel;
use App\Models\Notes;

use Config\Services;


class FormController extends BaseController
{

    public function index(){
        $questionmodel = new QuestionsModel();

        $data['title'] = "Liste des questions";

        $data['questions'] = $questionmodel->getWithQuestionnaire();

        // var_dump($data['questions']);
        // die();

        return view('backend/reponses/liste_question', $data);

    }

    public function devoir()
    {
        $auditorModel = new Auditors();
        $questionModel = new QuestionsModel();
        $session = session();

        $auditor = $auditorModel->getSingleAuditorWithNiveau($session->get('id'));
        $questionDevoirNive = $questionModel->getWithQuestionnaire();
        // var_dump($auditor);
        // die();

        $filteredQuestions = [];
        foreach ($questionDevoirNive as $question) {
            $niveauArray = json_decode($question['niveau'], true);
            if (is_array($niveauArray) && in_array($auditor['niveau_id'], $niveauArray)) {
                $filteredQuestions[] = $question;
            }
        }
        
        $data['auditor'] = $auditor;

        // Préparer les données pour la vue
        $data['questions'] = $filteredQuestions;
        $data['title'] = "Formulaire de Transformation";
        
        // var_dump($data['questions']);
        // die();

        // Charger la vue
        return view('backend/devoirs/mon_devoir', $data);
    }


    
    public function validedevoir()
    {
        $encrypter = Services::encrypter();
        
        $responseModel = new ReponsesModel();
        $userModel = new UserModel();
        $idUser = $this->request->getPost('iduser'); 
        $decryptedId = $encrypter->decrypt(hex2bin($idUser));
        
        if (!$decryptedId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Utilisateur non identifié.']);
        }
    
        $user = $userModel->find($decryptedId);
        
        if (!$user) {
            return $this->response->setJSON(['success' => false, 'message' => 'Utilisateur non trouvé.']);
        }
    
        // Vérifier si l'utilisateur a déjà soumis le formulaire
        $lastSubmission = $responseModel->getLastSubmissionDate($decryptedId);
        
        $now = time();
        
        $sevenDays = 7 * 24 * 60 * 60;
    
        if ($lastSubmission && (strtotime($lastSubmission['created_at']) + $sevenDays) > $now) {
            return $this->response->setJSON(['success' => false, 'message' => 'Vous avez déjà soumis le formulaire. Veuillez revenir après 7 jours.']);
        }
    
        $postData = $this->request->getPost();
    
        // Calculer la semaine de soumission
        $firstSubmitDate = $user['last_submit_date'] ? strtotime($user['last_submit_date']) : time();
        $weekNumber = ceil((time() - $firstSubmitDate) / $sevenDays);
    
        $responses = [];
        foreach ($postData as $key => $value) {
            if (strpos($key, 'question_') === 0) {
                $parts = explode('_', $key);
                $questionId = $parts[1];
    
                $responses[] = [
                    'question_id' => $questionId,
                    'response' => $value,
                    'user_id' => $decryptedId,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'week' => 'Semaine' . $weekNumber,
                ];
            }
        }
    
        // Insérer les réponses dans la base de données
        try {
            if ($responseModel->insertBatch($responses)) {
                $userModel->update($decryptedId, ['last_submit_date' => date('Y-m-d H:i:s')]);
    
                return $this->response->setJSON([
                    'success' => true,
                    'message' => "Réponses soumises avec succès !"
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Erreur lors de la soumission des réponses.'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Erreur lors de la soumission des réponses : ' . $e->getMessage()
            ]);
        }
    }


    public function responses()
    {
        $model = new ReponsesModel();
        $usermodel = new UserModel();
        $auditormodel = new Auditors();
        $users = $auditormodel->getAllAditors();
        $responses = $model->getResponsesWithUsersAndQuestions();
        // $data['responses'] = $model->getResponsesWithUsersAndQuestions();
        // var_dump($users);
        // die();
        $data['auditors'] = $users;
        $data['title'] = "Réponses de auditeurs";
        return view('backend/reponses/etudiants', $data);
    }

    public function responsesetudiant($id)
    {
        $model = new ReponsesModel();
        $usermodel = new UserModel();
        $auditormodel = new Auditors();
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($id));

        $auditor = $auditormodel->find($decryptedId);
        // var_dump($decryptedId);
        // var_dump($user['user_id']);
        // die();
        $responses = $model->getResponsesWithUsersAndQuestionsByAuditor($auditor['user_id']);
        $data['auditor'] = $auditor;
        $data['responses']= $responses;
        // die();
        // $data['auditors'] = $users;
        $data['title'] = "Réponses de auditeurs";
        return view('backend/reponses/reponse', $data);
    }

    public function edit($id)
    {
        $model = new FormResponseModel();
        $data['response'] = $model->find($id);

        return view('edit_form', $data);
    }

    public function update($id)
    {
        $model = new FormResponseModel();

        $data = [
            'morning_prayer_days' => $this->request->getPost('morning_prayer_days'),
            'average_prayer_hours' => $this->request->getPost('average_prayer_hours'),
            'prayer_time_for_mentees' => $this->request->getPost('prayer_time_for_mentees'),
            'simple_reading_count' => $this->request->getPost('simple_reading_count'),
            'text_study_count' => $this->request->getPost('text_study_count'),
            'theme_study_count' => $this->request->getPost('theme_study_count'),
            'sermons_listened_count' => $this->request->getPost('sermons_listened_count'),
            'character_trait_worked_on' => $this->request->getPost('character_trait_worked_on'),
            'tithe_given' => $this->request->getPost('tithe_given'),
            'soul_won' => $this->request->getPost('soul_won'),
            'person_invited' => $this->request->getPost('person_invited'),
            'mentees_condition' => $this->request->getPost('mentees_condition'),
            'role_explained' => $this->request->getPost('role_explained'),
            'department_prayer_time' => $this->request->getPost('department_prayer_time'),
            'department_difficulties' => $this->request->getPost('department_difficulties'),
            'internship_tasks' => $this->request->getPost('internship_tasks'),
            'internship_learning' => $this->request->getPost('internship_learning'),
        ];

        $model->update($id, $data);

        return redirect()->to('/form/responses');
    }

    public function delete($id)
    {
        $model = new FormResponseModel();
        $model->delete($id);

        return redirect()->to('/form/responses');
    }


    public function addquestionnaire(){
        $model = new Niveaux();
        $disciplinemodel = new Disciplines();
        $data['niveaux'] = $model->findAll();
        $data['disciplines'] = $disciplinemodel->findAll();
        $data['title'] = "Ajout des question";
        return view('backend/reponses/questionnaires', $data);
    }


    public function savequestionnaire(){
        $questionmodel = new QuestionsModel();
        $questionnairemodel = new QuestionnairesModel();
        
        $data =  $this->request->getPost();
        $questionnaireName = "";

        // var_dump($data);
        // die();

        if (count($data['niveau'])==1) { 

           $questionnaireName = 'EDM Niveau ' .$data['niveau'][0];

        }elseif (count($data['niveau']) == 2) {

            $questionnaireName = 'EDM Niveau ' .$data['niveau'][0]. ' et ' .$data['niveau'][1];

        }elseif ((count($data['niveau']) == 3)) {
            $questionnaireName = 'EDM Niveau ' .$data['niveau'][0]. '-' .$data['niveau'][1]. ' et ' .$data['niveau'][2];
        }else{
            $questionnaireName = 'EDM Niveau ' .$data['niveau'][0]. '-' .$data['niveau'][1]. ' - ' .$data['niveau'][2]. ' et ' .$data['niveau'][3];
        }

        $questionnaireExist = $questionnairemodel->getQuestionnaire($questionnaireName);

        // var_dump($questionnaireName);
        // die();

        if($questionnaireExist != NULL){


            $questionData = [
                'questionnaire_id' =>intval($questionnaireExist['id']),
                'niveau' => $data['niveau'],
                'question' => $data['question'],
                'question_type' => $data['question_type'],
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            

            $saveQuestion = $questionmodel->insert($questionData);
        
            // Vérification de l'insertion réussie
            if ($saveQuestion) {
                $response = [
                    'success' => true,
                    'message' => "Question enregistré avec succès !"
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => "Échec de l'enregistrement de l'auditeur !"
                ];
            }
        
            return $this->response->setJSON($response);


        }else{

            $questionnaireData = [
                'questionnaire_name' => $questionnaireName,
                'discipline_id' => $data['discipline_id'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $questionnaireId = $questionnairemodel->insert($questionnaireData);

            $questionData = [
                'questionnaire_id' =>inval($questionnaireId),
                'niveau' => $data['niveau'],
                'question' => $data['question'],
                'question_type' => $data['question_type'],
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $saveQuestion = $questionmodel->insert($questionData);
        
            // Vérification de l'insertion réussie
            if ($saveQuestion) {
                $response = [
                    'success' => true,
                    'message' => "Question enregistré avec succès !"
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => "Échec de l'enregistrement de l'auditeur !"
                ];
            }
        
            return $this->response->setJSON($response);

        }

        
        

    }
    
    public function saveNote()
    {
        
        try {
            $responseModel = new ReponsesModel(); 
            $userModel = new UserModel(); 
            $auditorModel = new Auditors(); 
            $notequestionModel = new NoteQuestionModel(); 
            $noteModel = new Notes();
        
            $idUser = $this->request->getPost('user_id');
            $week = $this->request->getPost('week');
            $auditor = $auditorModel->findAuditorByUserId($idUser); 
        
            // if (!$auditor) {
            //     // Gérer le cas où l'auditeur n'est pas trouvé
            //     return "Auditeur non trouvé pour cet utilisateur.";
            // }
        
            $postData = $this->request->getPost();
            // var_dump($postData);
            // die();
    
             $sumValues = 0;
        
            $responses = [];
        
            foreach ($postData as $key => $value) {
                if (strpos($key, 'note_') === 0) {
                    if (is_numeric($value)) {
                        $sumValues += (float) $value;
                    }
                    $parts = explode('_', $key);
                    $responseId = $parts[1];
                    $responses[] = [
                        'reponse_id' => $responseId,
                        'auditor_id' => $auditor['id'], 
                        'note' => intval($value),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }
            }
            
            $inserted = $notequestionModel->insertBatch($responses);
    
            if ($inserted) {
                $datanote = [
                    'auditor_id' => $auditor['id'],
                    'week' => $week,
                    'note' => $sumValues,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $note = $noteModel->insert($datanote);
                
                $responseIds = array_column($responses, 'reponse_id');
                
                $updated = $responseModel->updateResponseStatus($idUser, $responseIds);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => "Note enregistrée avec succès !"
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Echec d'enregistrement !"
                ]);
            }
            
        
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Erreur interne du serveur.'
            ]);
        }
        
        
    
        
    }
    
     public function responsesNotees()
     {
            $model = new ReponsesModel();
            $usermodel = new UserModel();
            $noteModel = new Notes();
            $notes = $noteModel->getNotesAuditor();
            $users = $usermodel->getUsersAuditor();
            $responses = $model->getResponsesWithUsersAndQuestionsAndNotes();
            // $data['responses'] = $model->getResponsesWithUsersAndQuestions();
            // var_dump($notes);
            // die();
            
            $data = [
                'users' => $users,
                'responses' => $responses,
                'notes' => $notes
            ];
            $data['title'] = "Réponses de auditeurs";
    
    
            return view('backend/reponses/reponses_notees', $data);
        }

}

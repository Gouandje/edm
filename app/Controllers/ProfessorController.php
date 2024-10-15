<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Professors;
use App\Models\UserModel;
use App\Models\Disciplines;


use Config\Services;

class ProfessorController extends BaseController
{
    public function index()
    {
        $model = new Professors();

        $data['title'] = 'Tous les formateurs';
       
        $datap = $model->getAllProfs();
        $data['professors'] = $datap;
        
        return view('backend/professors/professors', $data);
    }


    public function addform(){
        $model = new Disciplines();
        $data['disciplines'] = $model->findAll();

        $data['title'] = 'Formulaire de création des formateurs';

        return view('backend/professors/add_professor', $data);

    }

    public function save(){
       
        $encrypter = Services::encrypter();

        $model = new Professors();
        $usermodel = new UserModel();

        $data = $this->request->getPost();
        $image = $this->request->getFile('image');


        if($data['password'] != $data['confarmpassword']){
            $response = [
                'success' => false, 
                'message' => "Mot de passe et confirmation mot de passe ne correspondent pas"
            ];
                return $this->response->setJSON($response);
        }else{

            if ($image->isValid() && !$image->hasMoved()) {

                $newName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
            } 
            $userData = [
                'status' =>'actif',
                'is_online' => 0,
                'lastlogged_at'=>date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'login' => $data['login'],
                'role' => 'formateur',
                'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
                
            ];

                // var_dump($userData);
                // die();
            
            $userid = $usermodel->insert($userData);

            $savaData = [
                'nom_prenom' => $data['nom_prenom'],
                'adresse' => $data['adresse'],
                'telephone' => $data['telephone'],
                'date_naiss' => $data['date_naiss'],
                'discipline_id' => $data['discipline_id'],
                'genre' => $data['genre'],
                'user_id' => $userid,
                'description' => $data['description'],
                'created_at'=> date('Y-m-d H:m:s'),
                'updated_at'=> date('Y-m-d H:m:s'),
                'avatar' =>'uploads/' .$newName,
            ];
            $saveprofessor = $model->insert($savaData);

            if($saveprofessor){
                $professor = $model->find($saveprofessor);
                $response = [
                    'success' => true, 
                    'data' => $professor,
                    'message' => "Formateur enregistrée avec succès !"
                ];
                    return $this->response->setJSON($response);
            }else{
                $response = [
                    'success' => false, 
                    'data' => $data,
                    'message' => "Echec d'enregistrement du formateur !"
                ];
                    return $this->response->setJSON($response);
            }

        }
                
    }


    public function editform($encryptedId){
        $model = new Professors();
        $disciplinemodel = new Disciplines();
        $data['disciplines'] = $disciplinemodel->findAll();
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));

        $professor = $model->find($decryptedId);

        $userId= $professor['user_id'];
        $datap = $model->getSingleProf($userId);

        $data['professor'] =$datap;

        $data['title'] = 'Formulaire de modification des formateurs';
        return view('backend/professors/edit_professor', $data);

    }


    public function update($encryptedId)
    {
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));
        $data = $this->request->getPost();

        $model = new Professors();
        $usermodel = new UserModel();

        $professor = $model->find($decryptedId);

        // Vérifier si le professeur existe
        if (!$professor) {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Professeur non trouvé"
            ]);
        }

        // Gestion de l'image
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid()) {
            // Supprimer l'ancienne image si elle existe
            if (!empty($professor['avatar']) && file_exists(ROOTPATH . 'public/' . $professor['avatar'])) {
                unlink(ROOTPATH . 'public/' . $professor['avatar']);
            }

            // Déplacer la nouvelle image
            $newImageName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/uploads', $newImageName);
            $data['avatar'] = 'uploads/' . $newImageName;
        } else {
            // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
            $data['avatar'] = $professor['avatar'];
        }

        // Vérification si les champs de mot de passe sont vides
        $isPasswordEmpty = empty($data['password']) && empty($data['confarmpassword']);
        $isPasswordMatch = $data['password'] === $data['confarmpassword'];

        // Préparer les données à mettre à jour
        $editData = [
            'nom_prenom' => $data['nom_prenom'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'date_naiss' => $data['date_naiss'],
            'discipline_id' => $data['discipline_id'],
            'genre' => $data['genre'],
            'description' => $data['description'],
            'updated_at' => date('Y-m-d H:i:s'),
            'avatar' => $data['avatar'],
        ];

        if ($isPasswordEmpty) {
            // Mise à jour des données du professeur
            if ($model->update($decryptedId, $editData)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => "Formateur modifié avec succès !"
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Échec de modification du formateur !"
                ]);
            }
        } elseif ($isPasswordMatch) {
            // Préparer les données utilisateur à mettre à jour
            $edituserData = [
                'status' => 'actif',
                'is_online' => false,
                'lastlogged_at' => '',
                'updated_at' => date('Y-m-d H:i:s'),
                'login' => $data['login'],
                'role' => 'formateur',
                'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
            ];

            // Mettre à jour les données utilisateur
            if ($usermodel->update($professor['user_id'], $edituserData) && $model->update($decryptedId, $editData)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => "Formateur modifié avec succès !"
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Échec de modification du formateur !"
                ]);
            }
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Mot de passe et confirmation mot de passe ne correspondent pas"
            ]);
        }
    }
    
    public function delete(){

        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($this->request->getPost('usrid')));

        $model = new Professors();
        $usermodel = new UserModel();

        $professor = $model->find($decryptedId);
        $model->delete($professor['id']);
        $deleted = $usermodel->delete($decryptedId);

        if($deleted){
            $response = [
                'success' => true, 
                'message' => "Formateur supprimé !"
            ];
                return $this->response->setJSON($response);
        }else{
            $response = [
                'success' => false, 
                'message' => "Echec de suppression du formateur !"
            ];
                return $this->response->setJSON($response);

        }
    }
    
        public function toggleUserStatus()
    {
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($this->request->getPost('usrid')));
        $usermodel = new UserModel();
        $model = new Professors();

        $user = $model->find($decryptedId);

       

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Formateur non trouvé"
            ]);
        }

        // Changer le statut de l'utilisateur
        $newStatus = ($user['status'] === 'actif') ? 'inactif' : 'actif';
        $updateData = [
            'status' => $newStatus,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $userupdateData = [
            'status' => $newStatus,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        

        // Mettre à jour le statut de l'utilisateur
        if ($model->update($decryptedId, $updateData) && $usermodel->update($user['user_id'], $userupdateData)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => "Statut du formateur mis à jour avec succès !"
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Échec de la mise à jour du statut du formateur !"
            ]);
        }
    }
}

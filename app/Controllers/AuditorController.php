<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Auditors;
use App\Models\UserModel;
use App\Models\Niveaux;

use Config\Services;


class AuditorController extends BaseController
{
    public function index()
    {
        $model = new Auditors();

        // $data['auditors'] = $model->findAll();

        $datap = $model->getAllAditors();
        $data['auditors'] = $datap;

        $data['title'] = 'Tous les auditeurs';
        return view('backend/auditors/auditors', $data);
    }

    public function addform(){
        $niveaumodel = new Niveaux();
        $data['niveaux'] = $niveaumodel->findAll();

        $data['title'] = 'Formulaire de création des auditeurs';
        return view('backend/auditors/add_auditor', $data);

    }

    public function save()
    {
        // Récupération des services nécessaires
        $encrypter = \Config\Services::encrypter();
        $request = $this->request;
    
        // Récupération des données de la requête
        $data = $request->getPost();
        $image = $request->getFile('image');
    
        // Vérification que les mots de passe correspondent
        if ($data['password'] != $data['confarmpassword']) {
            $response = [
                'success' => false,
                'message' => "Mot de passe et confirmation mot de passe ne correspondent pas"
            ];
            return $this->response->setJSON($response);
        }
    
        // Déplacement de l'image si elle est valide
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads', $newName);
        }
    
        // Données pour l'utilisateur
        $userData = [
            'status' =>'actif',
            'is_online' => false,
            'lastlogged_at'=>date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:i:s'), // Utilisation du bon format de date
            'login' => $data['login'],
            'role' => 'auditeur',
            'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
        ];
    
        // Insertion de l'utilisateur dans la base de données
        $usermodel = new UserModel();
        $userId = $usermodel->insert($userData);
    
        // Données pour l'auditeur
        $auditorData = [
            'updated_at' => date('Y-m-d H:i:s'), // Utilisation du bon format de date
            'created_at' => date('Y-m-d H:i:s'), // Utilisation du bon format de date
            'nom_prenom' => $data['nom_prenom'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'niveau_id' => $data['niveau_id'],
            'user_id' => $userId,
            'avatar' => isset($newName) ? 'uploads/' . $newName : '', // Vérification de l'existence de $newName
        ];
    
        // Insertion de l'auditeur dans la base de données
        $model = new Auditors();
        $saveAuditor = $model->insert($auditorData);
    
        // Vérification de l'insertion réussie
        if ($saveAuditor) {
            $auditor = $model->find($saveAuditor);
            $response = [
                'success' => true,
                'data' => $auditor,
                'message' => "Auditeur enregistré avec succès !"
            ];
        } else {
            $response = [
                'success' => false,
                'message' => "Échec de l'enregistrement de l'auditeur !"
            ];
        }
    
        return $this->response->setJSON($response);
    }
    


    public function editform($encryptedId){

        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));

        $model = new Auditors();
        $niveaumodel = new Niveaux();
        $auditor = $model->find($decryptedId);

        $userId= $auditor['user_id'];
        $datap = $model->getSingleAuditor($userId);

        $data['auditor'] =$datap;

        $data['niveaux'] = $niveaumodel->findAll();
        $data['title'] = 'Formulaire de modification des auditeurs';
        return view('backend/auditors/edit_auditor', $data);

    }


    public function update()
    {
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($this->request->getPost('usrid')));
        $data = $this->request->getPost();
    
        $model = new Auditors();
        $usermodel = new UserModel();
    
        $auditor = $model->find($decryptedId);
    
        // Vérifier si le auditeur existe
        if (!$auditor) {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Auditeur non trouvé"
            ]);
        }
    
        $imageFile = $this->request->getFile('image');
        $avatarPath = $auditor['avatar'];
    
        if ($imageFile && $imageFile->isValid()) {
            // Supprimez l'ancienne image si elle existe
            if (!empty($avatarPath) && file_exists($avatarPath)) {
                unlink($avatarPath);
            }
    
            // Déplacez la nouvelle image
            $newImageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $newImageName);
            $avatarPath = 'uploads/' . $newImageName;
        }
    
        // Données à mettre à jour
        $editData = [
            'nom_prenom' => $data['nom_prenom'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'niveau_id' => $data['niveau_id'],
            'updated_at' => date('Y-m-d H:i:s'), // Utilisez le format correct pour la date
            'avatar' => $avatarPath,
        ];
    
        // Mise à jour utilisateur et auditeur avec mot de passe
        if (!empty($data['password']) && !empty($data['confarmpassword'])) {
            if ($data['password'] === $data['confarmpassword']) {
                $editUserData = [
                    'status' => 'actif',
                    'is_online' => false,
                    'lastlogged_at' => '',
                    'updated_at' => date('Y-m-d H:i:s'), // Utilisez le format correct pour la date
                    'login' => $data['login'],
                    'role' => 'formateur',
                    'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
                ];
    
                // Mettre à jour l'utilisateur
                if (!$usermodel->update($auditor['user_id'], $editUserData)) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => "Échec de la mise à jour de l'utilisateur !"
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Le mot de passe et la confirmation du mot de passe ne correspondent pas"
                ]);
            }
        }
    
        // Mettre à jour l'auditeur
        if ($model->update($decryptedId, $editData)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => "Auditeur modifié avec succès !"
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Échec de la modification de l'auditeur !"
            ]);
        }
    }
    
    public function updatebyAuditor()
    {
        $session = session();
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($this->request->getPost('usrid')));
        $data = $this->request->getPost();
        
    
        $model = new Auditors();
        $usermodel = new UserModel();
    
        $auditor = $model->getAuditors($decryptedId);
        
        // Vérifier si le auditeur existe
        if (!$auditor) {
            return $this->response->setJSON([
                'success' => false,
                'message' => "Auditeur non trouvé"
            ]);
        }
    
        $imageFile = $this->request->getFile('image');
        $avatarPath = $auditor['avatar'];
        
    
       if ($imageFile && $imageFile->isValid()) {
            // Suppression de l'ancienne image si elle existe physiquement
            if (!empty($avatarPath) && file_exists($avatarPath)) {
                unlink($avatarPath);
            }
    
            // Déplacement du nouveau fichier image vers le répertoire des uploads
            $newImageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $newImageName);
            $avatarPath = 'uploads/' . $newImageName;
        } else {
            // Si aucun nouveau fichier n'est téléchargé, conserver l'avatar existant
            $avatarPath = $auditor['avatar'];
        }
    
        // Données à mettre à jour
        $editData = [
            'nom_prenom' => $data['nom_prenom'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'genre' => $data['genre'],
            'niveau_id' => $auditor['niveau_id'],
            'updated_at' => date('Y-m-d H:i:s'), 
            'avatar' => $avatarPath,
        ];
        // var_dump($editData);
        // die();
    
        // Mise à jour utilisateur et auditeur avec mot de passe
        if (!empty($data['password']) && !empty($data['confarmpassword'])) {
            if ($data['password'] === $data['confarmpassword']) {
                $editUserData = [
                    'status' => 'actif',
                    'is_online' => false,
                    'lastlogged_at' => '',
                    'updated_at' => date('Y-m-d H:i:s'), // Utilisez le format correct pour la date
                    'login' => $data['login'],
                    'role' => 'auditeur',
                    'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
                ];
                $updated = $usermodel->update($decryptedId, $editUserData);
    
                if (!$updated) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => "Échec de la mise à jour de l'utilisateur !"
                    ]);
                }

                $auditorUpdated = $model->update($auditor['id'], $editData);
                if ($auditorUpdated) {
                    $session = session();
                    $session->destroy();
        
                    return $this->response->setJSON([
                            'success' => true,
                            'message' => "Auditeur modifié avec succès !"
                        ]);
                } else {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => "Échec de la modification de l'auditeur !"
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Le mot de passe et la confirmation du mot de passe ne correspondent pas"
                ]);
            }
        }else{
            $auditorUpdated = $model->update($auditor['id'], $editData);

            if ($auditorUpdated) {
                return $this->response->setJSON([
                        'success' => true,
                        'message' => "Auditeur modifié avec succès !"
                    ]);
                
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => "Échec de la modification de l'auditeur !"
                ]);
            }

        }
    }
    
    public function delete(){
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($this->request->getPost('usrid')));

        $model = new Auditors();
        $usermodel = new UserModel();

        $auditor = $model->find($decryptedId);
        $model->delete($auditor['id']);
        $deleted = $usermodel->delete($decryptedId);

        if($deleted){
            $response = [
                'success' => true, 
                'message' => "Auditeur supprimé !"
            ];
                return $this->response->setJSON($response);
        }else{
            $response = [
                'success' => false, 
                'message' => "Echec de suppression de l'auditeur !"
            ];
                return $this->response->setJSON($response);

        }
    }
}

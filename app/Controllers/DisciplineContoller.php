<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Disciplines;

use Config\Services;

class DisciplineContoller extends BaseController
{
    public function index()
    {
        $model = new Disciplines();
        $data['disciplines'] = $model->findAll();
    
        $data['title'] = 'Tous les disciplines';
        return view('backend/disciplines/disciplines', $data);
    }
    

    public function addform(){

        $data['title'] = 'Formulaire de création des disciplines';
        return view('backend/disciplines/add_discipline', $data);

    }

    public function save(){

        $model = new Disciplines();

        $data = $this->request->getPost();
       
        if($model->insert([
           'nom' => $data['nom'],
           'coeficient' => $data['coeficient'],
           'status' =>'actif',
        ])){
            $response = [
                'success' => true, 
                'message' => "Discipline enregistrée avec succès !"
            ];
                return $this->response->setJSON($response);
        }else{
            $response = [
                'success' => false, 
                'message' => "Echec d'enregistrement de la discipline !"
            ];
                return $this->response->setJSON($response);
        }
        
    }

    public function editform($encryptedId){
        $model = new Disciplines();
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));
        $data['discipline'] = $model->find($decryptedId);
    
        $data['title'] = 'Formulaire de modification des disciplines';
        return view('backend/disciplines/edit_discipline', $data);

    }


    public function update($encryptedId){

        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));
        $model = new Disciplines();
        $updated = $model->update($decryptedId, $this->request->getPost());
        if($updated){
            $response = [
                'success' => true, 
                'message' => "Discipline modifiée avec succès !"
            ];
            return $this->response->setJSON($response);

        }else{
            
            $response = [
                'success' => false, 
                'message' => "Echec de modification de la discipline !"
            ];
            return $this->response->setJSON($response);
        }


    }

    public function delete($encryptedId){
        
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));

        $model = new Disciplines();
        $deleted = $model->delete($decryptedId);

        if($deleted){
            $response = [
                'success' => true, 
                'message' => "Discipline supprimée avec succès !"
            ];
            return $this->response->setJSON($response);

        }else{
            
            $response = [
                'success' => false, 
                'message' => "Echec de suppression de la discipline !"
            ];
            return $this->response->setJSON($response);
        }

    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class NiveauController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Tous les niveaux';
        return view('backend/dashboard', $data);
    }

    public function addform(){
        $data['title'] = 'Formulaire de création des niveaux';
        return view('backend/dashboard', $data);

    }

    public function save(){
        
    }


    public function editform($encryptedId){

        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));
        $data['title'] = 'Formulaire de modification des niveaux';
        return view('backend/dashboard', $data);

    }


    public function update($encryptedId){

        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));

    }

    public function delete($encryptedId){
        
        $encrypter = Services::encrypter();
        $decryptedId = $encrypter->decrypt(hex2bin($encryptedId));

    }
}

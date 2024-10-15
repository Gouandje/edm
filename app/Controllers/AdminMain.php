<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UserModel;


class AdminMain extends BaseController
{

    // public function __construct(){

    //     $session = session();

    //     if ($session->get('isLoggedIn')==FALSE){

    //         redirect()->to('login');

    //     }elseif($session->get('role') == 'auditeur'){
    //         return  redirect()->to('mon-compte');
    //     }
    // }
    

    public function index()
    {
        

        $usermodel = new UserModel();
        $data['allAuditors'] = $usermodel->getAllAuditors();
        $data['allFormators']=  $usermodel->getAllFormateur();
        $data['allAdmins']=  $usermodel->getAllAdmin();
        $data['title'] = 'Tableau de bord EDM';
        return view('backend/dashboard', $data);
    }

    public function saveAdmin(){

        $usermodel = new UserModel();

        $data = $this->request->getPost();

        // var_dump($data);
        // die();
        if($data['password'] != $data['confarmpassword']){
            $response = [
                'success' => false, 
                'message' => "Mot de passe et confirmation mot de passe ne correspondent pas"
            ];
                return $this->response->setJSON($response);
        }else{

            // if ($image->isValid() && !$image->hasMoved()) {

            //     $newName = $image->getRandomName();
            //     $image->move(ROOTPATH . 'public/uploads', $newName);
            // } 
            $userData = [
                'status' =>'actif',
                'is_online' => 0,
                'lastlogged_at'=>date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'login' => $data['login'],
                'role' => 'administrateur',
                'mot_de_passe' => password_hash($data['password'], PASSWORD_DEFAULT),
                
            ];

                // var_dump($userData);
                // die();
            
            $userid = $usermodel->insert($userData);
            
            if($userid){

                $response = [
                    'success' => true, 
                    'message' => "admin enregistrée avec succès !"
                ];
                return $this->response->setJSON($response);

            }else{
                $response = [
                    'success' => false, 
                    'data' => $data,
                    'message' => "Echec d'enregistrement du admins !"
                ];
                    return $this->response->setJSON($response);
            }
        }

    }

    public function admindashboard(){
        $data['title'] = 'Tableau de bord EDM';
        return view('backend/dashboard', $data);

    }

    public function auditorpanel(){
        $data['title'] = 'Profil auditeur';
        return view('backend/profile_auditeur', $data);
        
    }

    public function professorpanel(){
        $data['title'] = 'Profil professor';
        return view('backend/profile_auditeur', $data);
        
    }
}

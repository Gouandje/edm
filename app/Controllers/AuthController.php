<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\Auditors;
use App\Models\Professors;



class AuthController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->auditorModel = new Auditors();
        $this->professorModel = new Professors();
    }

    public function login()
    {
        
        $data['title']="Connexion au compte";

        return view('backend/login', $data);
    }

    public function connection()
    {
        // $userModel = new UserModel();
        // $auditorModel = new Auditors();
        // $professorModel = new Professors();
        $session = session();
    
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
    
        $user = $this->userModel->where('login', $login)->first();
        // var_dump($user);
        // die();
    
        if (!$user || !password_verify($password, $user['mot_de_passe'])) {
            // Identifiants invalides, rediriger avec un message d'erreur
            $response = [
                'success' => false, 
                'message' => "Login ou mot de passe incorrect !"
            ];
            return $this->response->setJSON($response);
        }

        if($user['role'] == 'auditeur'){

            $auditorData = $this->auditorModel->getAuditors($user['id']);
          
            $ses_data = [
                'id' => $user['id'],
                'role' => $user['role'],
                'login' => $user['login'],
                'avatar' => $auditorData['avatar'],
                'nom_prenom' => $auditorData['nom_prenom'],
                'isLoggedIn' => true,
            ];
            $session->set($ses_data);
    
            if($session->get()){
                $response = [
                    'success' => true, 
                    'data'=> $session->get(),
                    'message' => "connexion reussie",
                    'url' =>'mon-compte'
                ];
                return $this->response->setJSON($response);
                // return redirect()->to('mon-compte');
            }

        }elseif($user['role'] == 'formateur'){
            $professorData = $this->professorModel->getSingleProf($user['id']);
            $ses_data = [
                'id' => $user['id'],
                'role' => $user['role'],
                'login' => $user['login'],
                'avatar' => $professorData['avatar'],
                'nom_prenom' => $professorData['nom_prenom'],
                'isLoggedIn' => true,
            ];
            $session->set($ses_data);
    
            if($session->get()){
                $response = [
                    'success' => true, 
                    'data'=> $session->get(),
                    'message' => "connexion reussie",
                    'url' =>'edm-admin'
                ];
                return $this->response->setJSON($response);
            }
        }else{
            $ses_data = [
                'id' => $user['id'],
                'role' => $user['role'],
                'login' => $user['login'],
                'avatar' =>  '' ,
                'nom_prenom' => '',
                'isLoggedIn' => true,
            ];
            $session->set($ses_data);
            $response = [
                'success' => true, 
                'data'=> $session->get(),
                'message' => "connexion reussie",
                'url' =>'edm-admin'
            ];
            return $this->response->setJSON($response);

        }

    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
    
        return redirect()->to('login');
    }
    public function forgotPassword()
    {
        $data['title']="Mot de passe oublié";

        // Rediriger vers la page de connexion
        return view('backend/forgot_password', $data);
    }

    public function register()
    {
        // Vérifier si le formulaire est soumis
        if ($this->request->getMethod() === 'post') {
            // Règles de validation
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]'
            ];

            // Messages d'erreur personnalisés
            $messages = [
                'email' => [
                    'is_unique' => 'Cet e-mail est déjà utilisé.'
                ]
            ];

            // Valider les données du formulaire
            if (!$this->validate($rules, $messages)) {
                // Rediriger avec des erreurs de validation
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Récupérer les données du formulaire
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 1 // ID du rôle client, vous pouvez changer selon votre logique
            ];

            // Enregistrer l'utilisateur dans la base de données
            $this->userModel->insert($data);

            // Connecter l'utilisateur automatiquement après l'enregistrement (facultatif)

            // Rediriger vers la page de connexion avec un message de succès
            return redirect()->to('/login')->with('success', 'Vous êtes maintenant inscrit. Connectez-vous pour accéder à votre compte.');
        }

        $data['title']="Création de compte";

        // Afficher le formulaire d'enregistrement
        return view('backend/register', $data);
    }

    public function dashboard()
    {
        // Vérifier le rôle de l'utilisateur
        $userId = session()->get('user_id');
        $role = $this->userModel->getRole($userId);

        // Rediriger en fonction du rôle de l'utilisateur
        switch ($role) {
            case 'formateur':
                return redirect()->to('/client/dashboard');
                break;
            case 'auditeur':
                return redirect()->to('mon-compte');
                break;
            case 'super administrateur':
                return redirect()->to('/admin/dashboard');
                break;
            default:
                return redirect()->to('/login');
        }
    }
}

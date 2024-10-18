<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('edm-admin', 'AdminMain::index');
$routes->post('ajout-admin', 'AdminMain::saveAdmin');
$routes->get('formateurs', 'ProfessorController::index');
$routes->post('professor/sauve-formateur', 'ProfessorController::save');
$routes->get('ajout-de-formateur', 'ProfessorController::addform');
$routes->get('modification-formateur/(:any)', 'ProfessorController::editform/$1');
$routes->post('sauve-modif-formateur/(:any)', 'ProfessorController::update/$1');
$routes->post('supprime-formateur', 'ProfessorController::delete');
$routes->post('modifier-stauts', 'ProfessorController::toggleUserStatus');
$routes->get('auditeurs', 'AuditorController::index');
$routes->post('sauve-auditeur', 'AuditorController::save');
$routes->get('ajout-de-auditeur', 'AuditorController::addform');
$routes->get('modification-auditeur/(:any)', 'AuditorController::editform/$1');
$routes->post('sauve-modif-auditeur', 'AuditorController::update');
$routes->post('supprime-auditeur', 'AuditorController::delete');
$routes->get('disciplines', 'DisciplineContoller::index');
$routes->post('sauve-discipline', 'DisciplineContoller::save');
$routes->get('ajout-de-discipline', 'DisciplineContoller::addform');
$routes->get('modification-discipline/(:any)', 'DisciplineContoller::editform/$1');
$routes->post('sauve-modif-discipline', 'DisciplineContoller::update');
$routes->get('supprime-discipline/(:any)', 'DisciplineContoller::delete/$1');
$routes->get('niveau', 'NiveauController::index');
$routes->post('sauve-niveau', 'NiveauController::save');
$routes->get('ajout-de-niveau', 'NiveauController::addform');
$routes->get('modification-niveau/(:any)', 'NiveauController::editform/$1');
$routes->post('sauve-modif-niveau', 'NiveauController::update');
$routes->get('supprime-niveau/(:any)', 'NiveauController::delete/$1');
$routes->get('reponses', 'FormController::responses');
$routes->get('responsesetudiant/(:any)', 'FormController::responsesetudiant/$1');
$routes->get('reponses-notees', 'FormController::responsesNotees');
$routes->get('ajout-de-questionnaire', 'FormController::addquestionnaire');
$routes->post('save-questionnaire', 'FormController::savequestionnaire');
$routes->post('save-note', 'FormController::saveNote');
$routes->get('liste-des-questions', 'FormController::index');
$routes->post('export-xlsx', 'ExportController::exportXlsx');
$routes->get('test-xlsx', 'ExportController::exportSimpleXlsx');


$routes->get('auditeur-edm-profile', 'AdminMain::auditorpanel');

$routes->get('login', 'AuthController::login');
$routes->post('connexion', 'AuthController::connection');
$routes->get('deconnexion', 'AuthController::logout');
$routes->get('creation-de-compte', 'AuthController::register');
$routes->get('mot-de-passe-oublie', 'AuthController::forgotPassword');

$routes->group('', ['filter' => 'auditorAuth'], function($routes) {
    $routes->get('mon-compte', 'EspacAuditorController::index');
    $routes->get('mon-devoir', 'FormController::devoir');
    $routes->post('valider-mon-devoir', 'FormController::validedevoir');
    $routes->post('sauve-modif-by-auditeur', 'AuditorController::updatebyAuditor');
});

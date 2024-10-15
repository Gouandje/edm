<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

use App\Models\Auditors;
use App\Models\ReponsesModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class ExportController extends BaseController
{
    public function exportXlsx()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $responseModel = new ReponsesModel();
    
        // Utiliser $this->request pour obtenir les données POST
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        // Si les dates ne sont pas fournies, définissez des valeurs par défaut
        if ($startDate) {
            $firstResponse = $responseModel->getFirstResponseDate();
    
            if ($firstResponse) {
                $startDate = $firstResponse['created_at'];
            } else {
                $startDate = (new \DateTime())->format('Y-m-d H:i:s'); // Si aucune réponse, utiliser la date actuelle
            }
        }
    
        if (!$endDate) {
            $endDate = (new \DateTime())->format('Y-m-d H:i:s');
        }
    
        // Ajout des en-têtes
        $sheet->setCellValue('A1', 'Nom Utilisateur');
        $sheet->setCellValue('B1', 'Texte de la Question');
        $sheet->setCellValue('C1', 'Réponse');
        $sheet->setCellValue('F1', 'Date de Soumission');
    
        $query = $responseModel->getResponsesWithUsersAndQuestionsExportation($startDate, $endDate);
    
        // Boucle pour remplir les données
        $row = 2;
        $previousUserId = null;
        foreach ($query as $response) {
            if ($response['question_type'] == 'checkbox') {
                // Pour les cases à cocher
                $formattedResponse = ($response['response'] == 'on') ? 'Oui' : 'Non';
            } else {
                // Pour les autres types de réponse (texte, nombre, etc.)
                $formattedResponse = $response['response'];
            }
    
            // Formater la date de soumission
            $date = new \DateTime($response['created_at']);
            $formattedDate = $date->format('d-m-Y H:i:s');
    
            // Ajouter le nom d'utilisateur seulement si l'utilisateur change
            if ($response['user_id'] !== $previousUserId) {
                $sheet->setCellValue('A' . $row, $response['nom_prenom']);
                $previousUserId = $response['user_id'];
            } else {
                $sheet->setCellValue('A' . $row, '');
            }
    
            $sheet->setCellValue('B' . $row, $response['question']);
            $sheet->setCellValue('C' . $row, $formattedResponse);
            $sheet->setCellValue('F' . $row, $formattedDate);
            $row++;
        }
    
        $writer = new Xlsx($spreadsheet);

        // Définir le nom du fichier
        $filename = 'export.xlsx';

        // Envoyer le fichier au navigateur pour téléchargement
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
        
    
        // Envoi de l'email avec le fichier joint
        $mail = new PHPMailer(true);
    
        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = getenv('SMTP_HOST'); // Remplacez par votre serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = getenv('SMTP_USER'); // Utiliser une variable d'environnement
            $mail->Password = getenv('SMTP_PASS'); // Utiliser une variable d'environnement
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = getenv('SMTP_PORT');
    
            // Configuration de l'email
            $mail->setFrom('gouandje@gmail.com', 'Gouandje boris');
            $mail->addAddress('dgouandjeboris@gmail.com', 'Boris sylvanus'); // Remplacez par l'adresse du destinataire
    
            $mail->Subject = 'Export des réponses';
            $mail->Body    = 'Veuillez trouver en pièce jointe le fichier exporté des réponses.';
    
            // Pièce jointe
            $mail->addAttachment($filePath);
    
            // Envoi de l'email
            $mail->send();
            redirect()->to('reponses');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

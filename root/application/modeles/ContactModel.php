<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require chemin::VENDOR . 'autoload.php'; 

class ContactModel {
    
    public function validateData($data) {
        $errors = [];
        if (empty(trim($data['name'] ?? ''))) $errors['name'] = "Le nom est requis.";
        $email = trim($data['email'] ?? '');
        if (empty($email)) $errors['email'] = "L'email est requis.";
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "L'email n'est pas valide.";
        if (empty(trim($data['subject'] ?? ''))) $errors['subject'] = "Le sujet est requis.";
        if (empty(trim($data['message'] ?? ''))) $errors['message'] = "Le message est requis.";
        return $errors;
    }
    
    public function sanitizeData($data) {
        return [
            'name' => trim($data['name'] ?? ''),
            'email' => trim($data['email'] ?? ''),
            'subject' => trim($data['subject'] ?? ''),
            'message' => trim($data['message'] ?? '')
        ];
    }
    
    public function sendEmail($data, $recipient = "loico34noro@gmail.com") {
        $mail = new PHPMailer(true);
        try {
            // Configuration SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'loico34noro@gmail.com';       
            $mail->Password = 'lern uacn tkop jkzk';      
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            // 1. Email pour VOUS (réception du message)
            $mail->setFrom($data['email'], $data['name']);  
            $mail->addAddress($recipient);                  
            $mail->Subject = "Contact Portfolio: " . $data['subject'];
            $mail->Body = "Nom: {$data['name']}\nEmail: {$data['email']}\nMessage:\n{$data['message']}\n";

            $mail->send();

            // 2. Accusé de réception pour L'EXPÉDITEUR
            $mail->clearAddresses();
            $mail->clearReplyTos();
            
            $mail->setFrom('loico34noro@gmail.com', 'Loïc Noro');
            $mail->addAddress($data['email'], $data['name']);
            $mail->Subject = "Confirmation de réception - " . $data['subject'];
            
            $mail->isHTML(true); // Active le HTML
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                        .header { background: #4CAF50; color: white; padding: 20px; text-align: center; }
                        .content { padding: 20px; background: #f9f9f9; }
                        .footer { text-align: center; padding: 10px; font-size: 12px; color: #666; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h2>Message bien reçu !</h2>
                        </div>
                        <div class='content'>
                            <p>Bonjour {$data['name']},</p>
                            <p>Merci pour votre message concernant : <strong>{$data['subject']}</strong></p>
                            <p>J'ai bien reçu votre demande et je vous répondrai dans les plus brefs délais.</p>
                            <hr>
                            <p><strong>Récapitulatif de votre message :</strong></p>
                            <p><em>" . nl2br(htmlspecialchars($data['message'])) . "</em></p>
                            <hr>
                            <p>Cordialement,<br>Loïc Noro</p>
                        </div>
                        <div class='footer'>
                            <p>Ceci est un message automatique, merci de ne pas y répondre.</p>
                        </div>
                    </div>
                </body>
                </html>
            ";
            
            // Version texte (fallback)
            $mail->AltBody = "Bonjour {$data['name']},\n\nMerci pour votre message concernant : {$data['subject']}\n\nJ'ai bien reçu votre demande et je vous répondrai dans les plus brefs délais.\n\nCordialement,\nLoïc Noro";

            $mail->send();
            return true;

        } catch (Exception $e) {
            error_log("Erreur mail: " . $mail->ErrorInfo);
            return false;
        }
    }
    
    public function logMessage($data) {
        $logFile = __DIR__ . '/../logs/contact.log';
        if (!is_dir(dirname($logFile))) mkdir(dirname($logFile), 0755, true);
        $logEntry = date('Y-m-d H:i:s') . " - From: {$data['name']} <{$data['email']}> - Subject: {$data['subject']}\n";
        return file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX) !== false;
    }
}

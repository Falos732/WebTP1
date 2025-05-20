<?php
    function envoyerMail($to, $message) {
        $subject = 'Code de vérification';
        $headers = 
        'From: ouelleth25techin@ouellet.h25.techinfo420.ca' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
   
        return mail($to, $subject, $message, $headers);    
     }

     function generation2FA($courriel, $ID)
     {
        session_start();
        $code = rand(100000,999999);
        $_SESSION['code'] = $code;
        
        $_SESSION['courriel'] = $courriel;

        $_SESSION['ID'] = $ID;

        envoyerMail($courriel, "Votre code est : ".$code);
        header('Location: 2FA.form.php');
     }
?>
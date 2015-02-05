<?php

class Mail
{
    public static function send($to, $vars, $type)
    {
      $subject  = $vars["subject"];
      $type     = $vars["type"];
      $name     = $vars["name"];
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'To: '. $name . ' '  . "\r\n";
      $headers .= 'From: CatchPenny Project <contact@catchpenny.cf>' . "\r\n";
      $headers .= "Subject: {$subject}". $to ."\r\n";
      //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
      //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
      //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
      //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
      //$headers[] = "X-Mailer: PHP/".phpversion();
      //$header.= "X-Priority: 1\r\n";
      

      $message = '<html><html>';

      mail($to, $subject, $message, $headers);

    }
}

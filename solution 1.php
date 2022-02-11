<?php
// On utilise \r et \n dans des doubles quotes ""
// HELPER Support pour API custom routes
// Permet d'envoyer l'e-mail
if (!function_exists('courrielEnvoyer')) {
    function courrielEnvoyer($inputs)
    {
        // Destinataire
        //$multiple_to_recipients =  get_bloginfo( 'admin_email' );
        $recp =  get_userdata(2);
        if ($recp)
            $recp_email = $recp->user_email;
        // sujet
        $the_subject     = "Message from: " . $inputs['prenom'] . " " . $inputs['nom'];

        // body de l'email
        $the_body_html .= "Sent by: " . $inputs['courriel'] . "\r\n";
        $the_body_html .= "Message: \r\n" . $inputs['message'];

        // envoi
        if (function_exists('wp_mail'))
            $wp_mail = wp_mail($recp_email,  $the_subject, $the_body_html);

        if ($wp_mail)
            return "success";

        return $recp_email;
    }
}
?>
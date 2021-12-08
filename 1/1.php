<?php

$to = "jbahamondealarza960@gmail.com";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";
$headers = "From: jbahamondealarza960@gmail.com";
ini_set("SMTP", "smtp-relay.gmail.com");
ini_set("smtp_port", "25");
mail($to, $subject, $message);
<?php
 $to = "wilsonlewis@gmail.com";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 $headers = "From: sender@example.com";
 if (mail($to, $subject, $body, $headers)) {
 	echo("<p>Message successfully sent!</p>");
 } else {
 	echo("<p>Message delivery failed...</p>");
 }
?>
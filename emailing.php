<?php
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ($_POST as $key => $val) {
    if (preg_match($test, $val)) {
      exit;
    }
  }

  // Les variables que vous avez déjà définies
  $to = "hajar.manyani66@gmail.com"; // Remplacez par votre adresse e-mail
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Configuration des en-têtes
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Utilisation de la fonction mail() pour envoyer l'e-mail
  $result = mail($to, $subject, $message, $headers);

  // Vérifiez si l'e-mail a été envoyé avec succès
  if ($result) {
    $response = array('status' => 'success', 'message' => 'Your message has been sent successfully.');
  } else {
    $response = array('status' => 'error', 'message' => 'Something went wrong.');
  }

  // Renvoie la réponse au format JSON
  header('Content-type: application/json');
  echo json_encode($response);
}
?>
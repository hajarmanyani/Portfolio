<?php
$cvFile = 'Manyani_Hajar_CV.pdf'; // Chemin vers le fichier CV

if (file_exists($cvFile)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf'); // Le type MIME du fichier (PDF dans cet exemple)
    header('Content-Disposition: attachment; filename="' . basename($cvFile) . '"');
    readfile($cvFile);
    exit;
} else {
    echo "Le fichier CV n'a pas été trouvé.";
}
?>

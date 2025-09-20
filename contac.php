<?php
if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to = "alejandrotareas029@gmail.com"; // <-- cambia este correo por el tuyo real
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Has recibido un nuevo mensaje desde tu portafolio:\n\n";
    $body .= "Nombre: $name\n";
    $body .= "Email: $email\n";
    $body .= "Asunto: $subject\n\n";
    $body .= "Mensaje:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
       echo "Gracias"; // página de agradecimiento
        exit;
    } else {
        echo "Error al enviar el mensaje. Inténtalo de nuevo.";
    }
}
?>

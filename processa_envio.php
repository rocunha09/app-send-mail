<?php
    //dados de confg do email
    require_once('config.php');
    //incluindo classe
    require_once('Mensagem.php');
    //incluindo lib
    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/OAuth.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/POP3.php";
    require "./bibliotecas/PHPMailer/SMTP.php";

    //namespaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $para = NULL;
    $assunto = NULL;
    $mensagem = NULL;

    if(isset($_POST['para']) && $_POST['para'] != ''){
        $para = $_POST['para'];
    }
    
    if(isset($_POST['assunto'])){
        $assunto = $_POST['assunto'];
    }
    
    if(isset($_POST['mensagem']) && $_POST['mensagem'] != ''){
        $mensagem = $_POST['mensagem'];
    }

    $msg = new Mensagem();

    $msg->__set('para', $para); 
    $msg->__set('assunto', $assunto); 
    $msg->__set('mensagem', $mensagem); 

    echo '<pre>';
    print_r($msg);
    echo '</pre>';

    $valido = $msg->mensagemValida();
    if(!$valido){
        echo 'mensagem invalida';
        die();
    }

    //instanciando objeto phpmailer para gerar o email desejado.
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = DEBUG_OUTPUT;                             
        $mail->isSMTP();                                     
        $mail->Host = HOST;  
        $mail->SMTPAuth = ENABLE_AUTH;                        
        $mail->Username = EMAIL_USERNAME;                
        $mail->Password = EMAIL_PASSWORD;                          
        $mail->SMTPSecure =  EMAIL_SECURE;                            
        $mail->Port = EMAIL_PORT;                                    

        //Recipients
        $mail->setFrom($mail->Username, 'Remetente');
        $mail->addAddress($msg->__get('para'), 'Destinatário');     // Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');     //encaminha resposta para...
        //$mail->addCC('cc@example.com');                           //copia
        //$mail->addBCC('bcc@example.com');                         //copia oculta

        /*
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        */

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $msg->__get('assunto');
        $mail->Body    = $msg->__get('mensagem');;
        //caso o body acima contenha conteúdo ou tag invalida, o altbody é enviado.
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Messagem enviada com sucesso!';
    } catch (Exception $e) {
        echo 'Não foi possível enviar este Email, por favor tente novamente mais tarde.';
        echo '<br>Detalhes do erro: ' . $mail->ErrorInfo;
    }
?>
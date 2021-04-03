<?php
    //dados de confg do email
    require_once('config.php');
    //incluindo classe
    require_once('Mensagem.php');

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
    /*
    echo '<pre>';
    print_r($msg);
    echo '</pre>';
    */
    $valido = $msg->mensagemValida();
    if(!$valido){
        $msg->status['cod_status'] = 2;
        $msg->status['desc_status'] = 'Não foi possível enviar este Email, por favor o preenchimento dos campos.';
        //die();
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
        $mail->Subject = utf8_decode($msg->__get('assunto'));
        $mail->Body    = utf8_decode($msg->__get('mensagem'));;
        //caso o body acima contenha conteúdo ou tag invalida, o altbody é enviado.
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $msg->status['cod_status'] = 1;
        $msg->status['desc_status'] = 'E-mail enviada com sucesso';

    } catch (Exception $e) {
        $msg->status['cod_status'] = 2;
        $msg->status['desc_status'] = 'Não foi possível enviar este Email, por favor tente novamente mais tarde. <br>Detalhes do erro: ' . $mail->ErrorInfo;
    }
?>

<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>
		<div class="container">  
            <div class="py-3 text-center">
                <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
                <h2>Send Mail</h2>
                <p class="lead">Seu app de envio de e-mails particular!</p>
            </div>
            <div class="row">
                <div class="col-md-12">

                <?php  if($msg->status['cod_status'] == 1) {?>
                    <div class="container">
                        <h1 class="display-4 text-success">Sucesso</h1>
                        <p><?= $msg->status['desc_status'] ?></p>
                        <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>

                <?php  if($msg->status['cod_status'] == 2) {?>
                    <div class="container">
                        <h1 class="display-4 text-danger">Ops!</h1>
                        <p><?= $msg->status['desc_status'] ?></p>
                        <a href="index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>

                </div>
            </div>
        </div>
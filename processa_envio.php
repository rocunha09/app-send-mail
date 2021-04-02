<?php
    require_once('Mensagem.php');

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
    if($valido){
        echo 'mensagem valida';
    } else {
        echo 'mensagem invalida';
    }
?>
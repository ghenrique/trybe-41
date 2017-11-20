<?php
    $professor = $_POST['professor'];
    $tipo_contato = $_POST['marcar-contato'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $data_preferencia = $_POST['date-time'];
    $local_preferencia = $_POST['place'];
    //====================================================
    
    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //==================================================== 
    $email_remetente = "mateuslaino@trybe41.com"; // deve ser uma conta de email do seu dominio 
    //====================================================
    
    //Configurações do email, ajustar conforme necessidade
    //==================================================== 
    $email_destinatario = "ghenrique.s21@gmail.com"; // pode ser qualquer email que receberá as mensagens
    $email_reply = "$email"; 
    $email_assunto = "Agendamento de $tipo_contato com o professor $professor"; // Este será o assunto da mensagem
    //====================================================
    
    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Tipo de contato: $tipo_contato \n"; 
    $email_conteudo .= "Nome: $nome \n";
    $email_conteudo .= "E-mail: $email \n";
    $email_conteudo .= "Telefone: $telefone \n";
    $email_conteudo .= "Data/horário de preferência: $data_preferencia \n";
    $email_conteudo .= "Local/bairro de preferência: $local_preferencia \n";
    
    //====================================================
    
    //Seta os Headers (Alterar somente caso necessario) 
    //==================================================== 
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
    //====================================================
    
    //Enviando o email 
    //==================================================== 
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ 
        echo "</b>E-mail enviado com sucesso!</b>"; 
    } else { 
        echo "</b>Falha no envio do E-Mail!</b>";
    } 
?>

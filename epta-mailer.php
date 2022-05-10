<?php
/**
 *  @import getSubscribersEmail();
 */
    require __DIR__ . '/get-subscribers.php';
 function sendEptaNewsletter(){

     $mailer = JFactory::getMailer();

     $config = JFactory::getConfig();
     $sender = array(
         $config->get( 'mailfrom' ),
         $config->get( 'fromname' )
     );

     $mailer->setSender($sender);
     $user = JFactory::getUser();
     $recipient = getSubscribersEmail();
     $mailer->addRecipient($recipient);

     $body   = '<h2>Our mail</h2>'
         . '<div>Dear subscribers of the EPTA database updates!
                During the last week, we received the following new entries in the EPTA database:'
         . '<img src="cid:logo_id" alt="logo"/></div>';
     $mailer->isHtml(true);
     $mailer->Encoding = 'base64';
     $mailer->setBody($body);

     $send = $mailer->Send();
 }

?>
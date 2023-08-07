<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Mailer;
class EmailsController extends AppController{
   public function index(){
      $this->Authorization->skipAuthorization();
      $email = new Mailer('default');
      $email->setTo('wisal.ahmadi345@gmail.com')
         ->setSubject('With Cake\Mailer')
         ->deliver('My message with mailer');
   }
}
?>
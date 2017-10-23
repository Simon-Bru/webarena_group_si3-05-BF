<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
    {


    }

public function login()
{

}

public function fighter()
{

}

public function sight()
{

}

public function diary()
{
 $this->loadModel('Events');
 $allEvents=$this->Events->find('all')->order(['Events.date' => 'DESC']);
 $this->set('allEvents',$allEvents);

}

}
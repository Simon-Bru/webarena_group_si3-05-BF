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
$this->set('myname','Luis');
$this->loadModel('Fighters');
$fighterlist=$this->Fighters->find('all');
pr($fighterlist->toArray());

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
 $allEvents=$this->Events->find('all');
 $this->set('allEvents',$allEvents);
}
}
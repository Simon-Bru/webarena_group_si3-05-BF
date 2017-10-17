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
$this->set('myname', "Julien Falconnet");
$this->loadModel('Fighters');
$figterlist=$this->Fighters->find('all');
pr($figterlist->toArray());
//$this->loadModel("Fighters");
$this->Fighters->test1();
$this->Fighters->getBestFighter();
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

}
}
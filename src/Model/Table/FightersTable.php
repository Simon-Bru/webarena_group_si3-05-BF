<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{
	function test1(){
		$ok="ok";
		echo($ok);

	}

	function getBestFighter(){
		
		return $this->find('all') -> order (['Fighters.level' => 'DESC']);

	}

}

<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table
{

	function getBestFighter(){
		
		return $this->find('all') -> order (['Fighters.level' => 'DESC']);

	}

}

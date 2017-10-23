<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * Fighter Entity
 *
 * @property int $id
 * @property string $name
 * @property string $player_id
 * @property int $coordinate_x
 * @property int $coordinate_y
 * @property int $level
 * @property int $xp
 * @property int $skill_sight
 * @property int $skill_strength
 * @property int $skill_health
 * @property int $current_health
 * @property \Cake\I18n\FrozenTime $next_action_time
 * @property int $guild_id
 */
class Fighter extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'player_id' => true,
        'coordinate_x' => true,
        'coordinate_y' => true,
        'level' => true,
        'xp' => true,
        'skill_sight' => true,
        'skill_strength' => true,
        'skill_health' => true,
        'current_health' => true,
        'next_action_time' => true,
        'guild_id' => true
    ];


    /*
     * Function to run before insert in database so the data validation passes
     * */
    public function beforeInsert() {
        //TODO Store values in static variables
        $this->skill_health = 5;
        $this->skill_sight = 2;
        $this->skill_strength = 1;
        $this->level = 1;
        $this->xp = 0;
        $this->current_health = 5;
        $this->coordinate_x = rand(0, 15);
        $this->coordinate_y = rand(0, 10);

        while(!$this->hasUniquePosition()) {
            $this->coordinate_x = rand(0, 15);
            $this->coordinate_y = rand(0, 10);
        }
    }

    private function hasUniquePosition() {
        $fighters = TableRegistry::get("Fighters");
        $query = $fighters->find();

        foreach ($query as $row) {
            if($this->coordinate_y == $row->coordinate_y
                || $this->coordinate_x == $row->coordinate_x) {
                return false;
            }
        }

        return true;
    }
}

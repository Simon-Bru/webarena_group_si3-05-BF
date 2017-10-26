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

    /**
     * Function to run before insert in database so the data validation passes
     * */
    public function beforeInsert() {
        $this->skill_health = DEFAULT_SKILL_HEALTH;
        $this->skill_sight = DEFAULT_SKILL_SIGHT;
        $this->skill_strength = DEFAULT_SKILL_STRENGTH;
        $this->level = 1;
        $this->xp = 0;
        $this->current_health = DEFAULT_SKILL_HEALTH;
        $this->coordinate_x = rand(0, ARENA_WIDTH);
        $this->coordinate_y = rand(0, ARENA_HEIGHT);

        while(!Fighter::positionIsFree($this->coordinate_x, $this->coordinate_y)) {
            $this->coordinate_x = rand(0, ARENA_WIDTH);
            $this->coordinate_y = rand(0, ARENA_HEIGHT);
        }
    }

    /**
     * Function to check wether fighter position is available
     */
    public static function positionIsFree($x, $y) {
        $fighters = TableRegistry::get("Fighters");
        $query = $fighters->find();

        foreach ($query as $row) {
            if($y == $row->coordinate_y
                && $x == $row->coordinate_x) {
                return false;
            }
        }

        return true;
    }

    public function levelUp() {
        if($this->xp / MAX_XP >= 1) {
            $this->level++;
            $this->xp = $this->xp - MAX_XP;
            $this->skill_health++;
            $this->current_health = $this->skill_health;
        }
    }

    public function hasFullXp(){
        $allow=false;
        if($this->xp / MAX_XP >= 1){
            $allow=true;
        }
        return $allow;
    }


    public function move($direction){

            switch ($direction) {
                //UP
                case 1:
                    $this->coordinate_y--;
                    break;
                //left
                case 2:
                    $this->coordinate_x--;
                    break;
                //right
                case 3:
                    $this->coordinate_x++;
                    break;
                //DOWN
                case 4:
                    $this->coordinate_y++;
                    break;
               default:
                    return false;
            }
        if(self::positionIsFree($this->coordinate_x, $this->coordinate_y) &&
            $this->coordinate_x>=0 &&
            $this->coordinate_x<=ARENA_WIDTH &&
            $this->coordinate_y>=0 &&
            $this->coordinate_y<= ARENA_HEIGHT) {
            return true;
        }
        else{
            return false;
        }
    }


}

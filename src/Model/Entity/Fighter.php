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
        $this->coordinate_x = rand(0, ARENA_WIDTH-1);
        $this->coordinate_y = rand(0, ARENA_HEIGHT-1);

        while(!Fighter::positionIsFree($this->coordinate_x, $this->coordinate_y)) {
            $this->coordinate_x = rand(0, ARENA_WIDTH-1);
            $this->coordinate_y = rand(0, ARENA_HEIGHT-1);
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

    public function levelUp($skill) {
        if($this->hasFullXp()) {
            switch($skill) {
                case 1:
                    $this->skill_sight++;
                    break;
                case 2:
                    $this->skill_strength++;
                    break;
                case 3:
                    $this->skill_health = $this->skill_health + 3;
                    break;
                default:
                    return false;
            }

            $this->level++;
            $this->xp = $this->xp - MAX_XP;
            $this->skill_health++;
            $this->current_health = $this->skill_health;
            return true;
        } else {
            return false;
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
            case "up":
                $this->coordinate_y--;
                break;
            //left
            case "left":
                $this->coordinate_x--;
                break;
            //right
            case "right":
                $this->coordinate_x++;
                break;
            //DOWN
            case "down":
                $this->coordinate_y++;
                break;
            default:
                return false;
        }
        if(self::positionIsFree($this->coordinate_x, $this->coordinate_y) &&
            $this->coordinate_x>=0 &&
            $this->coordinate_x<ARENA_WIDTH &&
            $this->coordinate_y>=0 &&
            $this->coordinate_y< ARENA_HEIGHT) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Returns true if the provided param $item is in Sight of the fighter
     * @param $item
     * @return bool
     */
    public function hasInSight($item) {
        return  abs($this->coordinate_y - $item->coordinate_y) +
            abs($this->coordinate_x - $item->coordinate_x) <= $this->skill_sight &&
            abs($this->coordinate_y - $item->coordinate_y) +
            abs($this->coordinate_x - $item->coordinate_x) >= 0;
    }

    public function attack($target) {
        $activeFighterId = $this->getSelectedFighterId();
        $myFighter = $this->Fighters->get($activeFighterId);
        if($myFighter['Fighter']['guild_id'] !=NULL)
            $bonus=$this->guildAttackBonus($this->guild_id,$target,$myFighter);
        $rand=rand(1,20)+$bonus;
        // $rand = rand(1, 20);// random value between 1 and 20
        //Conditions of success attack
        if ($rand > (ATTACK_THRESHOLD + $target->level - $this->level)) {

            $target->current_health -= $this->skill_strength;

            if ($target->current_health <= 0) {
                $this->xp += $target->level;
            } else {
                $this->xp++;
            }

            return true;
        } else {
            return false;
        }
    }

    public function guildAttackBonus($guild_id,$target,$myFighter){
        $query=$this->find('all',
            array('conditions'=>
                array('guild_id'=>$guild_id, 'Fighter.id !='=>$myFighter)));
        $bonus=0;
        foreach($query as $row){
            if(($row['Fighter']['coordinate_x']==$target['Fighter']['coordinate_x']+1
                && $row['Fighter']['coordinate_y']==$target['Fighter']['coordinate_y']||
                $row['Fighter']['coordinate_x']==$target['Fighter']['coordinate_x']-1
                && $row['Fighter']['coordinate_y']==$target['Fighter']['coordinate_y']||
                $row['Fighter']['coordinate_x']==$target['Fighter']['coordinate_x']
                && $row['Fighter']['coordinate_y']==$target['Fighter']['coordinate_y']+1||
                $row['Fighter']['coordinate_x']==$target['Fighter']['coordinate_x']
                && $row['Fighter']['coordinate_y']==$target['Fighter']['coordinate_y']-1))
            {
                $bonus++;
            }

        }
        return $bonus;
    }

    public function isInContact($item) {
        return abs($this->coordinate_x - $item->coordinate_x) == 1
            || abs($this->coordinate_y - $item->coordinate_y) == 1;

    }
}

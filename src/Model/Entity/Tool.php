<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tool Entity
 *
 * @property int $id
 * @property string $type
 * @property int $bonus
 * @property int $coordinate_x
 * @property int $coordinate_y
 * @property int $fighter_id
 *
 * @property \App\Model\Entity\Fighter $fighter
 */
class Tool extends Entity
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
        'type' => true,
        'bonus' => true,
        'coordinate_x' => true,
        'coordinate_y' => true,
        'fighter_id' => true,
        'fighter' => true
    ];

    // We give conditions to the insert of tools in the DB
    public function initialize() {
        $type = rand(0, 8);

        $this->type = array_keys(TOOLS_TABLE)[$type];
        $this->bonus = rand(1, 3);
        $this->coordinate_x = rand(0, ARENA_WIDTH-1);
        $this->coordinate_y = rand(0, ARENA_HEIGHT-1);

        while(!Fighter::positionIsFree($this->coordinate_x, $this->coordinate_y)) {
            $this->coordinate_x = rand(0, ARENA_WIDTH-1);
            $this->coordinate_y = rand(0, ARENA_HEIGHT-1);
        }
    }

}

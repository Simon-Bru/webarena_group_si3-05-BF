<?php


/**
 * The Maximum xp for a fighter
 */
define('MAX_XP', 4);

/**
 * The Default health skill point for a fighter
 */
define('DEFAULT_SKILL_HEALTH', 5);

/**
 * The Default strength skill points for a fighter
 */
define('DEFAULT_SKILL_STRENGTH', 1);

/**
 * The Default strength skill points for a fighter
 */
define('DEFAULT_SKILL_SIGHT', 2);

/**
 * Arena width dimension
 */
define('ARENA_WIDTH', 15);

/**
 * Arena width dimension
 */
define('ARENA_HEIGHT', 10);

/**
 * Default avatar image
 */
define('DEFAULT_AVATAR', 'default.png');

/**
 * Attack threshold
 */
define('ATTACK_THRESHOLD', 10);

/**
 * Number of tools to generate
 */
define('NUMBER_OF_TOOLS', 12);

/**
 * Tools definition
 */
define('TOOLS_TABLE', [
    [
        'icon' => 'icons8-sword',
        'name' => 'Sword',
        'bonus' => 'skill_strength'
    ],
    [
        'icon' => 'icons8-defense',
        'name' => 'Shield',
        'bonus' => 'skill_health'
    ],
    [
        'icon' => 'icons8-crime',
        'name' => 'Gun',
        'bonus' => 'skill_sight'
    ],
    [
        'icon' => 'icons8-tomahawk',
        'name' => 'Tomahawk',
        'bonus' => 'skill_strength'
    ],
    [
        'icon' => 'icons8-knight-helmet',
        'name' => 'Helmet',
        'bonus' => 'skill_health'
    ],
    [
        'icon' => 'icons8-goggles',
        'name' => 'NightVision',
        'bonus' => 'skill_sight'
    ],
    [
        'icon' => 'icons8-body-armor',
        'name' => 'Armor',
        'bonus' => 'skill_health'
    ],
    [
        'icon' => 'icons8-gauntlet-gloves',
        'name' => 'Gloves',
        'bonus' => 'skill_strength'
    ],
    [
        'icon' => 'icons8-archers-bow',
        'name' => 'Bow',
        'bonus' => 'skill_sight'
    ]
]);
?>
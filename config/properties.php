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
const TOOLS_TABLE = [
    'Sword' => [
        'icon' => 'icons8-sword',
        'bonus' => 'skill_strength'
    ],
    'Shield' => [
        'icon' => 'icons8-defense',
        'bonus' => 'skill_health'
    ],
    'Gun' => [
        'icon' => 'icons8-crime',
        'bonus' => 'skill_sight'
    ],
    'Tomahawk' => [
        'icon' => 'icons8-tomahawk',
        'bonus' => 'skill_strength'
    ],
    'Helmet' => [
        'icon' => 'icons8-knight-helmet',
        'bonus' => 'skill_health'
    ],
    'NightVision' => [
        'icon' => 'icons8-goggles',
        'bonus' => 'skill_sight'
    ],
    'Armor' => [
        'icon' => 'icons8-body-armor',
        'bonus' => 'skill_health'
    ],
    'Gloves' => [
        'icon' => 'icons8-gauntlet-gloves',
        'bonus' => 'skill_strength'
    ],
    'Bow' => [
        'icon' => 'icons8-archers-bow',
        'bonus' => 'skill_sight'
    ]
];
?>
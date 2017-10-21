<?php

declare(strict_types=1);

namespace buildertools;

use pocketmine\level\Position;
use pocketmine\Player;

/**
 * Class Selectors
 * @package buildertools
 */
class Selectors {

    /** @var Position[] $pos1 */
    public static $pos1 = [];

    /** @var Position[] $pos2 */
    public static $pos2 = [];

    /** @var Player[] $wandSelectors */
    public static $wandSelectors = [];

    /**
     * @param Player $player
     * @param int $pos
     * @param Position $position
     */
    public static function addSelector(Player $player, int $pos, Position $position) {
        if($pos == 1) {
            self::$pos1[strtolower($player->getName())] = $position;
        }
        if($pos == 2) {
            self::$pos2[strtolower($player->getName())] = $position;
        }
    }

    /**
     * @param Player $player
     * @param int $pos
     * @return Position $position
     */
    public static function getPosition(Player $player, int $pos):Position {
        if($pos == 1) {
            return self::$pos1[strtolower($player->getName())];
        }
        if($pos == 2) {
            return self::$pos2[strtolower($player->getName())];
        }
        return null;
    }

    /**
     * @param int $pos
     * @param Player $player
     * @return bool
     */
    public static function isSelected(int $pos, Player $player):bool {
        if($pos == 1) {
            return boolval(isset(self::$pos1[strtolower($player->getName())]));
        }
        if($pos == 2) {
            return boolval(isset(self::$pos2[strtolower($player->getName())]));
        }
        return false;
    }

    /**
     * @param Player $player
     */
    public static function switchWandSelector(Player $player) {
        if(isset(self::$wandSelectors[strtolower($player->getName())])) {
            unset(self::$wandSelectors[strtolower($player->getName())]);
        }
        else {
            self::$wandSelectors[strtolower($player->getName())] = $player;
        }
    }

    /**
     * @param Player $player
     * @return bool
     */
    public static function isWandSelector(Player $player):bool {
        return boolval(isset(self::$wandSelectors[strtolower($player->getName())]));
    }
}
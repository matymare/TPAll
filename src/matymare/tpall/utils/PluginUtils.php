<?php

declare(strict_types=1);

namespace matymare\tpall\utils;

use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\player\Player;

class PluginUtils {

    public static function PlaySound(Player $player, string $sound, $volume = 1, $pitch = 1) {
        $playerPosition = $player->getPosition();
        $packet = PlaySoundPacket::create(
            $sound,
            $playerPosition->getX(),
            $playerPosition->getY(),
            $playerPosition->getZ(),
            $volume,
            $pitch
        );
        $player->getNetworkSession()->sendDataPacket($packet);
    }
}

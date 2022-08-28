<?php

declare(strict_types=1);

/*
 * Plugin created by matymare
 * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
 * The plugin must not be modified without asking the plugin owner
 * You can write to me on Discord: Roospy#1666
 */

# Credits - fernanACM

namespace matymare\tpall;

use matymare\tpall\utils\PluginUtils;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    protected function onEnable(): void {
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() == "tpall") {
            if (!($sender instanceof Player)) {
                $sender->sendMessage("Use this command in-game");
                return true;
            }
            foreach ($this->getServer()->getOnlinePlayers() as $player) {
                $player->teleport($sender->getPosition());
                $player->sendMessage(
                    $this->getConfig()->getNested("Settings.Prefix") . $this->getConfig()->getNested("Settings.Message-tpall")
                );
                if ($this->getConfig()->getNested("Settings.Tpall-no-sound")) {
                    PluginUtils::PlaySound($sender, $this->getConfig()->getNested("Settings.Tpall-sound"));
                }
            }
            return true;
        }
        return false;
    }
}

<?php

    /*
     * Plugin created by matymare
     * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
     * The plugin must not be modified without asking the plugin owner
     * You can write to me on Discord: Roospy#1666
     */

namespace matymare\tpall;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\world\Position;


class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "tpall":
				foreach ($this->getServer()->getOnlinePlayers() as $echo) {
						$echo->teleport($sender);
						$echo->sendMessage("§l§8[§eTPAll§8] §r§8> §aTeleporting...\n");
				}
				return true;
			break:
				return false;
		} 
	}
}	

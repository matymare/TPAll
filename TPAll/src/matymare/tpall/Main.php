<?php

    /*
     * Plugin created by matymare
     * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
     * The plugin must not be modified without asking the plugin owner
     * You can write to me on Discord: matymare#1666
     */

namespace matymare\tpall;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\level\Position;
use pocketmine\player\Player;

class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args):bool{
		if($cmd->getName() == "tpall"){
			if ($sender instanceof Player) {
				foreach ($this->getServer()->getOnlinePlayers() as $players) {
						$players->teleport($sender->getPosition());
						$sender->sendMessage("§l§8[§eTPAll§8] §r§8> §aTeleporting...");
				}
			}else{
				$sender->sendMessage("§l§8[§eTPAll§8] §r§8> §cUse this command in game!");
			}
			return true;
		}
		return false;
	}
}	

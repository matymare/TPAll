<?php

    /*
     * Plugin created by matymare
     * TPAll - It is a PocketMine-MP plugin by which you can port all players to one place
     * The plugin must not be modified without asking the plugin owner
     * You can write to me on Discord: Roospy#1666
     */

namespace matymare\tpall;

use pocketmien\Server;
use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\world\Position;
use pocketmine\utils\Config;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class Main extends PluginBase{
    
    private $config;
    
    public function onEnable(): void{
        $this->saveDefaultConfig();
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "tpall":
				foreach ($this->getServer()->getOnlinePlayers() as $echo) {
						$echo->teleport($sender->getPosition());
						$echo->sendMessage($this->config->get("message-tpall"));
				}
				return true;
			break;
				return false;
		} 
	}
}

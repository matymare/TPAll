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
# Credits - fernanACM
use matymare\tpall\utils\PluginUtils;

class Main extends PluginBase{
    
    public Config $config;
    
    public function onEnable(): void{
        $this->saveDefaultConfig();
        $this->saveResource("config.yml");
	$this->config = new Config($this->getDataFolder() . "config.yml");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
	    switch($command->getName()){
	        case "tpall":
                    if($sender instanceof Player){    
                        foreach ($this->getServer()->getOnlinePlayers() as $echo) {
			    $echo->teleport($sender->getPosition());
		            $echo->sendMessage($this->config->get("Settings")["Prefix"] . $this->config->get("Settings")["Message-tpall"]);
                            if($this->config->get("Settings")["Tpall-no-sound"]){
                               PluginUtils::PlaySound($sender, $this->config->get("Settings")["Tpall-sound"], 1, 1);
                            }
		        }
                    }else{
                       $sender->sendMessage("Use this command in-game");   
                }
            }
        return true;
    }
}

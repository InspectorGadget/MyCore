<?php

namespace RTG\Core;

/* Essentials */
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\CommandExecutor;

/* Commands! */
use RTG\Core\CMD\GMSCommand;

class MyCore extends PluginBase implements Listener {
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        $this->getCommand("gms")->setExecutor(new GMSCommand ($this));
        
    }
    
    public function onDisable() {
    }
    
}
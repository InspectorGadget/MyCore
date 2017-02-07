<?php

namespace RTG\Core\CMD;

/**
 * Description of GM
 *
 * @author RTG
 */

use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;

use RTG\Core\MyCore;

class GMSCommand implements CommandExecutor {
    
    public $pl;
    
    public function __construct(MyCore $plg) {
        $this->plg = $plg;
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, string $args) {
        switch(strtolower($cmd->getName())) {
            
            case "gms":
                if($sender->hasPermission("server.command.gamemode")) {
                    
                    $gm = $sender->getGamemode();
                        
                        if($gm === 0) {
                            
                            $sender->sendMessage("[Server] You are in gamemode Survial already!");                            
                            
                        }
                        else {
                            
                            $sender->setGamemode(0);
                            $sender->sendMessage("[Server] You are now in Gamemode Survival!");
                            
                        }
                        
                        if(isset($args[0])) {
                            
                            $p = $args[0];
                            
                                if($p instanceof Player) {
                                    
                                    $gmm = $p->getGamemode();
                                        
                                        if($gmm === 0) {
                                            
                                            $sender->sendMessage("[Server] $p is already in Gamemode Survival!");  
                                            
                                        }
                                        else {
                                            
                                            $p->setGamemode(0);
                                            $p->sendMessage("[Server] Your gamemode has been changed to Survival!");
                                            $sender->sendMessage("[Server] $p's Gamemode has been changed to Survival!");
                                            
                                        }
                                    
                                }
                                else {
                                    $sender->sendMessage("[Error] $p isn't a Player!");
                                }
                            
                        }
                      
                }
                else {
                    $sender->sendMessage(TF::RED . "[Error] You have no permission to use this command!");
                }
                return true;
            break;
                
            
            
            
        }
    }
    
}

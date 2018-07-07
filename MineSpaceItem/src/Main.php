<?php

namespace MineSpaceItem;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\scheduler\PluginTask;
use pocketmine\level\Position;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat as Color;
use pocketmine\inventory\Inventory;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
  public $prefix = "§l§6[MINE§fSPACE]";
  public $second = 1;
  public $timer = true;
  
  public function onEnable(){
    
    @mkdir($this->getDataFolder());
		$xyz = [
		
				'x' => 0,
				'y' => 0,
				'z' => 0,
		
		];
		$cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML,$xyz);
		$cfg->save();
    
  }
  
  public function juze(){
    
  }
}

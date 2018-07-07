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
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info("$this->prefix §bis §aEnable.");
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new Time($this), 20);
    @mkdir($this->getDataFolder());
		$Pos = [
		
				'x1' => 0,
				'y1' => 0,
				'z1' => 0,
				'x1' => 0,
				'y1' => 0,
				'z1' => 0,
		
		];
		$cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML,$xyz);
		$cfg->save();
    
  }
  
  public function juze(){
    
  }
}

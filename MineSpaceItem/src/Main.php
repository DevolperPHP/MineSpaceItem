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
		$pos = [
		
				'x1' => 0,
				'y1' => 0,
				'z1' => 0,
				'x2' => 0,
				'y2' => 0,
				'z2' => 0,
			        'level' => 'world'
		
		];
		$cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML,$pos);
		$cfg->save();
    
  }
	
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
    	case "msitem":
    		if($sender->isOp()){
    			if(isset($args[0])){
    				switch($args[0]){
    					case "pos1":
    						$x = $sender->getFloorX();
    						$y = $sender->getFloorY();
    						$z = $sender->getFloorZ();
    						$this->getConfig()->set("x1", $x);
    						$this->getConfig()->set("y1", $y);
    						$this->getConfig()->set("z1", $z);
    						$this->getConfig()->save();
    						$sender->sendMessage(TextFormat::GREEN."- Pos1 set to: ($x, $y, $z)");
    					return true;
    					case "pos2":
    						$x = $sender->getFloorX();
    						$y = $sender->getFloorY();
    						$z = $sender->getFloorZ();
    						$level = $sender->getLevel()->getName();
    						$this->getConfig()->set("x2", $x);
    						$this->getConfig()->set("y2", $y);
    						$this->getConfig()->set("z2", $z);
    						$this->getConfig()->set("Level", $level);
    						$this->getConfig()->save();
    						$sender->sendMessage(TextFormat::GREEN."- Pos2 set to: ($x, $y, $z)");
						    				}
    			}
    		}
    	}
  }
	
  public function isInside(Vector3 $pp, Vector3 $p1, Vector3 $p2){
	return ((min($p1->getX(),$p2->getX()) <= $pp->getX()) && (max($p1->getX(),$p2->getX()) >= $pp->getX()) && (min($p1->getY(),$p2->getY()) <= $pp->getY()) && (max($p1->getY(),$p2->getY()) >= $pp->getY()) && (min($p1->getZ(),$p2->getZ()) <= $pp->getZ()) && (max($p1->getZ(),$p2->getZ()) >= $pp->getZ()));
  }
  
  public function juze(){
     $all = $this->getServer()->getOnlinePlayers();
     $x1 = $this->getConfig()->get("x1");
     $z1 = $this->getConfig()->get("z1");
     $y1 = $this->getConfig()->get("y1");
     $x2 = $this->getConfig()->get("x2");
     $y2 = $this->getConfig()->get("y2");
     $z2 = $this->getConfig()->get("z2");
     $level = $this->getConfig()->get("Level");
     foreach ($all as $p) {
	     
	     if($this->timer == true){
		     $this->second--;
	     }
	     
	     if($this->second == 0){
		     $this->second = 0 + 1;
		     if($this->isInside($player,new Vector3($x1,$y1,$z1,$level),new Vector3($x2,$y2,$z2,$level))){
			     if($p()->getInventory()->contains(Item::get(345, 0, 0))){
				     $p->getInventory()->additem(item::get(345, 0, 1));
			     }
			     
			     if($p()->getInventory()->contains(Item::get(377, 0, 0))){
				     $p->getInventory()->additem(item::get(377, 0, 1));
			     }
			     
			     if($p()->getInventory()->contains(Item::get(329, 0, 0))){
				     $p->getInventory()->additem(item::get(329, 0, 1));
			     }
		     }
		     
	     }
     }
 public function onDisable(){
    $this->getConfig()->save();
 }
}

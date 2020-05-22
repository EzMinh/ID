<?php

namespace EzMinh\ID;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;
use pocketmine\Player;
use pocketmine\utils\Config;

class Main extends PluginBase {
    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool {
        if(!$sender instanceof Player) {
            $sender->sendMessage(C::RED."You can't not use this command here!");
            return false;
        } else {
            if($cmd->getName() == "id") {
                $id_item = $sender->getInventory()->getItemInHand()->getId();
                $message = str_replace("{ID}", $id_item, $this->getConfig()->get("message"));
                $sender->sendMessage($message);
            }
        }
        return true;
    }
}
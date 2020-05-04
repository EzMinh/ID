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
            if($this->getConfig()->get("lang") == "en")
            {
                $sender->sendMessage(C::RED."You can't not use this command here!");
            }
            else
            {
                $sender->sendMessage(C::RED."Bạn không thể dùng lệnh tại đây !");
            }
        } else {
            if($cmd->getName() == "id") {
                $id_item = $sender->getInventory()->getItemInHand()->getId();
                if($this->getConfig()->get("lang") == "en")
            {
                $sender->sendMessage("The ID of the item you are holding is: ".C::YELLOW.$id_item);
            }
            else
            {
                $sender->sendMessage("ID của vật phẩm bạn đang cầm là: ".C::YELLOW.$id_item);
            }
            }
        }
        return true;
    }
}

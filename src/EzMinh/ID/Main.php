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
            switch($this->getConfig()->get("lang")) {
                case "en":
                    $sender->sendMessage(C::RED."You can't not use this command here!");
                break;
                case "vi":
                    $sender->sendMessage(C::RED."Bạn không thể dùng lệnh tại đây !");
                break;
                default:
                $sender->sendMessage(C::RED."You can't not use this command here!");
                break;
            }
        } else {
            if($cmd->getName() == "id") {
                $id_item = $sender->getInventory()->getItemInHand()->getId();
                switch($this->getConfig()->get("lang")) {
                    case "en":
                        $sender->sendMessage("The ID of the item you are holding is: ".C::YELLOW.$id_item);
                    break;
                    case "vi":
                        $sender->sendMessage("ID của vật phẩm bạn đang cầm là: ".C::YELLOW.$id_item);
                    break;
                    default:
                    $sender->sendMessage("The ID of the item you are holding is: ".C::YELLOW.$id_item);
                    break;
                }
            }
        }
        return true;
    }
}

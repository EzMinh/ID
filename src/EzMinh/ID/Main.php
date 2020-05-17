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
            switch($this->getConfig()->get("lang")){
                case "en":
                    $this->getLogger()->info(C::RED."You can't not use this command here!");
                break;

                case "vi":
                    $this->getLogger()->info(C::RED."Bạn không thể dùng lệnh tại đây !");
                break;

                default:
                    $this->getLogger()->info(C::RED."Bạn không thể dùng lệnh tại đây !");
                    $this->getLogger()->info(C::RED."You can't not use this command here!");
                break;
            }
        } else {
            if($this->getConfig()->get("lang")) {
                $id_item = $sender->getInventory()->getItemInHand()->getId();
                switch($this->config->get()){
                    case "en":
                        $sender->sendMessage("The ID of the item you are holding is: ".C::YELLOW.$id_item);
                    break;

                    case "vi":
                        $sender->sendMessage("ID của vật phẩm bạn đang cầm là: ".C::YELLOW.$id_item);
                    break;

                    default:
                        $sender->sendMessage(C::RED."Please switch your language to english or vietnamese!");
                        $sender->sendMessage(C::RED."Hãy chỉnh lại ngôn ngữ sang tiếng anh hoặc tiếng việt!");
                    break;
                }
            }
        }
        return true;
    }
}

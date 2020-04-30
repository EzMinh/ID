<?php

namespace EzMinh\ID;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;
use pocketmine\Player;

class Main extends PluginBase {
    public function onEnable() {
        $this->getLogger()->info(C::GREEN."Đã bật");
    }
    public function onDisable() {
        $this->getLogger()->info(C::RED."Đã tắt");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool {
        if(!$sender instanceof Player) {
            $sender->sendMessage(C::RED."Bạn không thể dùng lệnh tại đây");
        } else {
            if($cmd->getName() == "id") {
                $id_item = $sender->getInventory()->getItemInHand()->getId();
                $sender->sendMessage("ID của vật phẩm bạn đang cầm là: ".C::YELLOW.$id_item);
            }
        }
        return true;
    }
}
?>
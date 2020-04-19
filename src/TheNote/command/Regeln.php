<?php

namespace TheNote\command;

use pocketmine\Player;
use TheNote\formapi\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use TheNote\Main;

class Regeln extends Command {

    public function __construct(Main $plugin){
        parent::__construct("regeln", Main::$prefix . "Zeigt die Regeln", "/regeln", ["rules", "serverregeln"]); #hier kannst du deine Überschrift sowie command ändern musst du daber dann auch in der Main ändern
        $this->plugin = $plugin;                                                                                     # ^ Da kannst du mehrere Befehle Hinzufügen
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if (!$sender instanceof Player) {
            $sender->sendMessage(Main::$prefix . "Nutze den Command Ingame");
            return false;
        }
        if ($sender instanceof Player) {
            if ($sender instanceof Player) {
                $form = new SimpleForm(function (Player $sender, $data) {
                    $result = $data;
                    if ($result === null) {
                        return true;
                    }
                    switch ($result) {
                        case 0:
                            $sender->sendMessage(Main::$prefix . "Coole nachrricht1"); #ändere hier deine message oder was frag mich
                            break;
                        case 1:
                            $sender->kick("Du hast den Button 2 gedrückt ohoh :O", false); #wenn auf true steht Kicket by admin! bei false nicht.

                    }
                });
                $form->setTitle("Hier ist der Titel");
                $form->setContent("Hier ist der Content\n Hier ist die zweite zeile");
                $form->addButton("Button 1", 0); #ändere hier dein Buttonname in ""
                $form->addButton("Button 2", 0); #ändere hier dein Buttonname in ""
                $form->sendToPlayer($sender);
                return $form; #wiederholt die Form
            }
        }
        return true; #wiederholt den command bei erneuter eingabe
    }
}
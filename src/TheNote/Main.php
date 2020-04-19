<?php

namespace TheNote;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use TheNote\command\Regeln;


class Main extends PluginBase implements Listener
{
    public static $prefix = "§f[§6Regeln§f] §e"; #hier kannst du deine Prefix ändern

    public function onEnable()
    {
        $this->getLogger()->info(Main::$prefix . "Das ist ein Besipielplugin bei TheNote");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("regeln", new Regeln($this)); # fals du deinen Command ändern willst musst du hier auch deinen Command Ändern

    }
    public function onDisable()
    {
        $this->getLogger()->info(Main::$prefix . "Das Plugin wurde Deaktiviert");

    }

    public function onJoin(PlayerJoinEvent $event) {
        $spieler = $event->getPlayer()->getName();
        $all = $this->getServer()->getOnlinePlayers();
        $event->setJoinMessage("Der Spieler " . $spieler . " hat den Server betreten " . count($all) . "/20]"); #trage deine Slots hier ein also ersetze 20 mit deiner Spielerzahl
    }
    public function onQuit(PlayerQuitEvent $event) {
        $spieler = $event->getPlayer()->getName();
        $all = $this->getServer()->getOnlinePlayers();
        $event->setQuitMessage("Der Spieler " . $spieler . " hat den Server verlassen " . count($all) . "/20]"); #trage deine Slots hier ein also ersetze 20 mit deiner Spielerzahl
    }
}

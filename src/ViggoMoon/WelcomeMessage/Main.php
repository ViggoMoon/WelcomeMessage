<?php

namespace ViggoMoon\WelcomeMessage;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    protected function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin Enabled");
    }

    protected function onDisable(): void
    {
        $this->getLogger()->info("Plugin Disabled");
    }

    public function getMessage(): string
    {
       $config = new Config($this->getDataFolder()."config.json", Config::JSON);
       return $config->get("message");
    }

    public function onJoin(PlayerJoinEvent $event)
    {
        $event->getPlayer()->sendMessage($this->getMessage());
    }

}
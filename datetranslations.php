<?php

namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class DateTranslationPlugin
 * @package Grav\Plugin
 */
 
 
class DateTranslationPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents() {
        return [
            'onPluginsInitialized'  => ['onPluginsInitialized', 0],
        ];
    }

    public function onPluginsInitialized() {
        if (true === $this->isAdmin()) {
            $this->active = false;
            return;
        }
        
        $this->enable([
            'onTwigExtensions' => ['onTwigExtensions', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ]);
    }

    public function onTwigExtensions() {
        require_once __DIR__ . '/DateTranslate/DateTranslate.php';
        $this->grav['twig']->twig->addExtension(new DateTranslate($this->grav['language']->getActive()));
    }
    
    public function onTwigSiteVariables() {
        $this->grav['twig']->twig_vars['active_language'] = $this->grav['language']->getActive();
    }
}

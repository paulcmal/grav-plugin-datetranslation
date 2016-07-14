<?php

namespace Grav\Plugin;
require_once __DIR__.'/../vendor/autoload.php';
use Jenssegers\Date\Date;

class DateTranslate extends \Twig_Extension {

    public function __construct($grav) {
        $this->grav = $grav;
    }

    public function getName() {
      return 'DateTranslate';
    }
  
    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('dt', [$this, 'dateTranslate']),
        );
    }
    
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('dt', [$this, 'dateTranslate']),
        );
    }
  /**
   * Provides clone function to Twig templates.
   *
   * @param object $object
   *   An object to clone.
   *
   * @return object
   *   Cloned object.
   */
    public function dateTranslate($date, $format) {
        if (in_array($format, Array('short', 'long'))) {
            //echo "translating $date with PLUGIN_DATETRANSLATIONS." .strtoupper($format);
            $format = $this->grav['language']->translate('PLUGIN_DATETRANSLATIONS.' . strtoupper($format));
            //echo "to $format<br>";
        }

        $now = Date::parse($date);
        $locale = Date::getLocale();
        Date::setLocale($this->grav['language']->getActive());
        $output = $now->format($format);
        Date::setLocale($locale);
        return $output;
        
    }
}

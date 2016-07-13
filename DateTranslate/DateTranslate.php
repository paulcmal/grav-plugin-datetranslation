<?php

namespace Grav\Plugin;
require_once __DIR__.'/../vendor/autoload.php';
use Jenssegers\Date\Date;

class DateTranslate extends \Twig_Extension {

    public function __construct($lang) {
        $this->lang = $lang;
    }

    public function getName() {
      return 'DateTranslate';
    }
  
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('date_translate', [$this, 'dateTranslate'], array(
            'is_safe' => array('html'),)),
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
      Date::setLocale($this->lang);
      return Date::parse($date)->format($format);
  }
}

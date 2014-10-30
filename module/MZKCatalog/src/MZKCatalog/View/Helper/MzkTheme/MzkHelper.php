<?php
namespace MZKCatalog\View\Helper\MzkTheme;
use Zend\View\Helper\AbstractHelper;

class MzkHelper extends AbstractHelper {

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getRestrictionMessage() {
        if (!is_array($patron = $this->catalogLogin())) {
            return $patron;
        }
        
        return "ahoj";
        
        if (isset($this->config->MzkRestriction->enable) && $this->config->MzkRestriction->enable) {
            return $this->config->MzkRestriction->message;
        }
        return null;
    }

}

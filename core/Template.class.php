<?php

class Template
{

protected $_controller;
    protected $_action;
    protected $vars = array();

    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    public function render($doNotRenderHeader = 0)
    {
        $html = new HTML();

        extract($this->vars);

        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->_controller.DS.'header.php')) {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->_controller.DS.'header.php';
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'header.php';
            }
        }
        require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->_controller).'.php';

    //require_once (ROOT . DS . 'app' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');
        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->_controller.DS.'footer.php')) {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->_controller.DS.'footer.php';
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'footer.php';
            }
        }
    }
    public function __destruct()
    {
    }
}

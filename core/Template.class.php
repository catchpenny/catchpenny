<?php

class Template
{
    protected $controller;
    protected $action;
    protected $vars = array();

    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function render($doNotRenderHeader = 0)
    {
        $html = new HTML();

        extract($this->vars);
        
        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->controller.DS.'header.php')) {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->controller.DS.'header.php';
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'header.php';
            }
        }
       
        
        if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->controller).DS.strtolower($this->action).'.php')) {
            require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->controller).DS.strtolower($this->action).'.php';
            
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->controller).'.php';  
             
            }
        
        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->controller).DS.'sidebar.php')) {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.strtolower($this->controller).DS.'sidebar.php';
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'sidebar.php';
            }
        }
        
        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->controller.DS.'footer.php')) {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.$this->controller.DS.'footer.php';
            } else {
                require_once ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'footer.php';
            }
        }
    }
    public function __destruct()
    {
    }
}

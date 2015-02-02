<?php
/*
 * Todo:
 * Shift this file into app/class
 */
class Controller
{

    protected $_controller;
    protected $_model;
    protected $_action;
    protected $_extended_action;
    protected $_template;
    public $doNotRenderHeader;
    public $render;

    public function __construct($controller, $action, $extended_action, $model)
    {
        $this->_action = $action;
        $this->_controller = $controller;
        $this->_extended_action = $extended_action;
        $this->_model = $model;
        $this->doNotRenderHeader = 0;
        $this->render = 1;
        $this->_template = new Template($controller, $action);
    }

    public function set($key, $value)
    {
        $this->_template->set($key, $value);
    }

    public function __destruct()
    {
        if ($this->render) {
            $this->_template->render($this->doNotRenderHeader);
        }
    }
}

<?php
/*
 * Todo:
 * Shift this file into app/class
 */
class Controller
{

    protected $controller;
    protected $model;
    protected $action;
    protected $extended_action;
    protected $template;
    public $doNotRenderHeader;
    public $render;

    public function __construct($controller, $action, $extended_action, $model)
    {
        $this->action            = $action;
        $this->controller        = $controller;
        $this->model             = $model;
        $this->doNotRenderHeader = 0;
        $this->render            = 1;
        $this->extended_action   = $extended_action;
        $this->template          = new Template($controller, $action);
    }

    public function set($key, $value)
    {
        $this->template->set($key, $value);
    }

    public function __destruct()
    {
        if ($this->render) {
            $this->template->render($this->doNotRenderHeader);
        }
    }
}

<?php

/*
 * This Files call the controller and passes the needed argument to controller class
 * Todo:
 * validate $Action before passing and choose somthing for $Extend_Action
 * $Extend_Action is an array
 *
 * Fix Try and Catch
 */

function routing($url)
{
    /*
     * eg. if url= something.com/anything/something/useless
     * anything = will be $Controller
     * something = will $Action
     * Rest of the url will become an array and will be stored in $Extend_Action
     */

    $urlArray      = array();
    $urlArray      = explode("/", $url);
    $Action        = '';
    $Extend_Action = array();

    //Initialise Algorithm
    $Controller    = $urlArray[0];
    //Check for Action
    if (sizeof($urlArray)>1) {
        array_shift($urlArray);
        $Action = $urlArray[0];
    }
    //check for Extended Action
    if (sizeof($urlArray)>1) {
        array_shift($urlArray);
        $Extend_Action = $urlArray;
    }
    /*
     * If $controller is equal to Null we load default page that is home page
     */
    if ($Controller == '') {
        $Controller = 'Home';
    }
    if ($Action == '') {
        $Action = $Controller;
    }
    /*
     * Define all essential variables
     * Add _controller to $Controller to identify it as controller
     * Add _model to $Model to identify it as model
     */
    $Controller = rtrim(ucfirst($Controller));
    $Model = $Controller;
    $Model .= 'Model';
    $PassController = $Controller;
    $Controller .= "Controller";
    /*
     * Try Load the $controller page and $Action Method and also pass $Extended_Action and $Model
     * if fail load error page
     */
    try {
        if ((int) method_exists($Controller, $Action)) {
            $page = new $Controller($PassController, $Action, $Extend_Action, $Model);
            call_user_func_array(array($page, $Action), $Extend_Action);
        } else {
            $page = new error_404_controller();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

<?php
/**
 *
 * Scope for tremendous improvement.
 * Currently, can only search for users by email.
 *
 */

class SearchController extends Controller
{
    public function search()
    {
        Auth::checkLogin(false);
        if(isset($_POST["search"])){
            $model = new $this->model;
            $result = $model->search(strtolower($_POST["search"]));
            if ($result == $_POST["search"])
            {
                $info = $model->details($_POST["search"]);
            }
        }
    }
}
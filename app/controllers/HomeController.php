<?php

class HomeController extends Controller
{

    public function home()
    {
      $this->doNotRenderHeader=1;
    }
}

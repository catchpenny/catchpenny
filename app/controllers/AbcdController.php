<?php

class AbcdController extends Controller
{
    public function abcd()
    {   $this->doNotRenderHeader=1;
        echo 'hello';
        $this->set('world','World');
    }
}
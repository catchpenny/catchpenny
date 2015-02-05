<?php

class HTML
{
    private $js = array();

    public function sanitize($data)
    {
        return mysql_real_escape_string($data);
    }

    public function link($text, $path, $prompt = false, $confirmMessage = "Are you sure?")
    {
        $path = str_replace(' ', '-', $path);
        if ($prompt) {
            $data = '<a href="javascript:void(0);" onclick="javascript:jumpTo(\''.BASE_PATH.'/'.$path.'\',\''.$confirmMessage.'\')">'.$text.'</a>';
        } else {
            $data = '<a href="'.BASE_PATH.'/'.$path.'">'.$text.'</a>';
        }

        return $data;
    }

    public function includeJs($fileName)
    {    echo file_get_contents(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'js'.DS.$fileName.'.js');
    }

    public function includeCss($fileName)
    {    echo file_get_contents(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'css'.DS.$fileName.'.css');
    }
}

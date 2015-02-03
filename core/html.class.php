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
    {
        $data = '<script src="'.BASE_PATH.'/public/js/'.$fileName.'.js"></script>';

        return $data;
    }

    public function includeCss($fileName)
    {
        //$data = '<style href="'.BASE_PATH.'/public/css/'.$fileName.'.css"></style>';
        $data = '<link rel="stylesheet" type="text/css" href="'.BASE_PATH.'/public/css/'.$fileName.'.css">';

        return $data;
    }
}

<?php

namespace App\Libraries;

class Title
{

    public function title($params)
    {
        if ($params['title'])
            return view('admin/cmps/title', $params);
    }
}

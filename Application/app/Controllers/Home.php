<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Welcome';
        $data['content'] = 'pages/home/index';
        $data['attachments']['alerts'] = [];
        $data['attachments']['phones'] = [];
        $phone = model(Phone::class);
        $data['attachments']['phones'] = $phone->getAll();
        if ($data['attachments']['phones'] === null || $data['attachments']['phones'] === []) {
                array_push($data['attachments']['alerts'], [ 'type' => 'info', 'message' => 'There are no phones to show.' ]);
        }
        return view('main', $data);
    }
}

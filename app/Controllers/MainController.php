<?php

namespace App\Controllers;

class MainController
{
    public function __construct()
    {
        layout('layouts/main1');
    }
    public function test()
    {
        $data = [
            'olma',
            'anor',
            'uzum',
            'qovun',
            'banan',
            'tarvuz',
        ];
        return view('test', ['mevalar' => $data]);
    }
}

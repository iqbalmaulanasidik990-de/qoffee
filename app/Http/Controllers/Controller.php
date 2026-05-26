<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function admin()
{
    $queues = Queue::latest()->get();

    return view('admin', compact('queues'));
}
}

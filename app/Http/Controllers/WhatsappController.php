<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function index()
    {
        return view('whatsapp.wa');
    }
}

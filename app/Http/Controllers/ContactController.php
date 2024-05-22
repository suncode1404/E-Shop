<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $title = 'Liên hệ';
        return view('client.form.contact', compact("title"));
    }
}

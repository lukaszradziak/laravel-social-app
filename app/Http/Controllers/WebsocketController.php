<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WebsocketService;

class WebsocketController extends Controller
{
    public function hooks(Request $request, WebsocketService $service)
    {
        $service->setRequest($request)->handle();

        return 'ok';
    }
}

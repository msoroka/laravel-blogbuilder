<?php

namespace App\Http\Controllers;

use App\Handlers\SubscriptionHandler;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $handler;

    public function __construct(SubscriptionHandler $handler)
    {
        $this->handler = $handler;
    }

    public function subscribe(Request $request)
    {
        return $this->handler->subscribe($request);
    }

    public function unsubscribe(Request $request)
    {
        return $this->handler->unsubscribe($request);
    }
}

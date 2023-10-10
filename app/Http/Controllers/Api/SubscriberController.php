<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subscriber\SubscriberStoreRequest;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(SubscriberStoreRequest $request)
    {
        $data = $request->validated();

        $subscriber = Subscriber::query()->create($data);

        return response()->json($subscriber);
    }
}

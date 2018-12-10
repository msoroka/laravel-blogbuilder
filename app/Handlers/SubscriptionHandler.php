<?php

namespace App\Handlers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SubscriptionHandler
{
    public function subscribe(Request $request)
    {
        Validator::make($request->only(['email']), [
            'email' => 'required|email',
        ])->validate();

        Subscriber::query()
            ->withoutGlobalScope('subscribed')
            ->updateOrCreate(
                $request->only('email'),
                [
                    'unsubscribe_code' => str_random(32),
                    'unsubscribed_at'  => null,
                ]
            );

        flash('Successfull subscribed to newsletter.')->success();

        return redirect()->back(302, [], route('home'));
    }

    public function unsubscribe(Request $request)
    {
        Validator::make($request->only(['email', 'code']), [
            'email' => 'required|email|exists:subscribers',
            'code'  => 'required',
        ])->validate();

        $subscriber = Subscriber::query()
            ->where('email', $request->input('email'))
            ->where('unsubscribe_code', $request->input('code'))
            ->first();

        if (!$subscriber) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->route('home');
        }

        $subscriber->update([
            'unsubscribe_code' => null,
            'unsubscribed_at'  => Carbon::now(),
        ]);

        flash('Successfully unsubscribed from newsletter.')->success();

        return redirect()->route('home');
    }
}

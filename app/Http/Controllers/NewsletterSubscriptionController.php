<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'unique:newsletter_subscribers,email'],
        ], [
            'email.unique' => "You're already subscribed to the GSL Bulletin.",
        ]);

        NewsletterSubscriber::create($data);

        return back()->with('newsletter_status', 'Thanks for subscribing to the GSL Bulletin.');
    }
}

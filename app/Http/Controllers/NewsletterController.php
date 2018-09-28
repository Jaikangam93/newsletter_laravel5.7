<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('newsletter');
    }
    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribe($request->email);
            return redirect('newsletter')->with('success', 'Please confirm the subscrition ');
        }
        return redirect('newsletter')->with('failure', 'Sorry! You have already subscribed ');
            
    }
}

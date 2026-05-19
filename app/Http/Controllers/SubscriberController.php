<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Store a newly created subscriber in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'You are already subscribed to our newsletter!',
            'email.email' => 'Please provide a valid email address.',
            'email.required' => 'Email is required.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first('email'),
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        Subscriber::create([
            'email' => $request->email,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for subscribing to our newsletter!',
            ]);
        }

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}

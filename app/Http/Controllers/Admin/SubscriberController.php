<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Mail\SubscriberBroadcast;
use App\Models\DynamicContent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $subscribers = Subscriber::when($search, function ($query, $search) {
                return $query->where('email', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function broadcastForm()
    {
        return view('admin.subscribers.broadcast');
    }

    public function sendBroadcast(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $subscribers = Subscriber::all();
        
        if ($subscribers->isEmpty()) {
            return redirect()->back()->with('error', 'No subscribers found.');
        }

        $this->setMailConfig();

        $count = 0;
        foreach ($subscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(new SubscriberBroadcast($request->subject, $request->message));
                $count++;
            } catch (\Exception $e) {
                \Log::error('Failed to send newsletter to ' . $subscriber->email . ': ' . $e->getMessage());
            }
        }

        return redirect()->route('admin.subscribers.index')->with('success', "Announcement sent successfully to $count subscribers.");
    }

    private function setMailConfig()
    {
        $settings = DynamicContent::first();
        if ($settings && $settings->mail_host) {
            $config = [
                'transport' => $settings->mail_mailer ?? 'smtp',
                'host' => $settings->mail_host,
                'port' => $settings->mail_port,
                'encryption' => $settings->mail_encryption,
                'username' => $settings->mail_username,
                'password' => $settings->mail_password,
                'timeout' => null,
                'auth_mode' => null,
            ];

            Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp'), $config));
            Config::set('mail.from.address', $settings->mail_from_address ?? $settings->mail_username);
            Config::set('mail.from.name', $settings->mail_from_name ?? ($settings->companyname ?? config('app.name')));
        }
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber removed successfully.');
    }
}

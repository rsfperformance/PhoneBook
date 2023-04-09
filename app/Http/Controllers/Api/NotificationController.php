<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class NotificationController extends BaseController
{
    use ApiResponse;
    public function __construct()
    {
        parent::__construct();
    }

    public function sendBirthdayNotifications()
    {
        $today = Carbon::today();
        $contacts = Contact::with(['user'])
            ->whereMonth('date_of_birth', $today->month)
            ->whereDay('date_of_birth', $today->day)
            ->get();
        $recipients = [];

        foreach ($contacts as $contact) {
            $recipients[$contact->user->email][] = $contact->full_name;
        }


        foreach ($recipients as $email=>$recipient) {
            $birthday_people = implode(', ', $recipient);

            Mail::send('mail.send', ['birthday_people' => $birthday_people], function ($message) use ($email) {
                $message->from('applebro@applebro.u1056610.cp.regruhosting.ru', 'AlifTech');
                $message->to($email)->subject('Сообщение');
            });
        }

        return $this->successResponse('Email notifications sent successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewReservation;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function newReservationNotification()
   {
    $userSchema = User::first();

    $offerData = [
        'name' => 'BOGO',
        'body' => 'You received an offer.',
        'thanks' => 'Thank you',
        'offerText' => 'Check out the offer',
        'offerUrl' => url('/'),
        'offer_id' => 007
    ];

    Notification::send($userSchema, new NewReservation($offerData));

    dd('Task completed!');
   }
}

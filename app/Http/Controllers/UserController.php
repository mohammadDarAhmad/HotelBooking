<?php

namespace App\Http\Controllers;

use App\Jobs\MatchSendEmail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sendEmail()
    {
        $emailJob = new MatchSendEmail();
        dispatch($emailJob);
    }
}

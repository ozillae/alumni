<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class GuestController extends Controller
{
    public function member()
    {
        $members = Member::paginate(8); // Paginate with 8 members per page
        return view('guest.member', ['members' => $members]);
    }

    public function memberDetail($code)
    {
        $member = Member::where('code', $code)->firstOrFail();
        return view('guest.member-detail', ['member' => $member]);
    }
}

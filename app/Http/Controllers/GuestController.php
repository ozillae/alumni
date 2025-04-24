<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Event; // Add this import for Event model

class GuestController extends Controller
{
    public function member(Request $request)
    {
        $members = Member::paginate(8); 
        return view('guest.member', ['members' => $members]);
    }

    public function memberDetail($code)
    {
        $member = Member::where('code', $code)->firstOrFail();
        $member_portos = $member->portfolios()->get(); // Fetch related portfolios
        return view('guest.member-detail', ['member' => $member, 'member_portos' => $member_portos]);
    }

    public function photos(Request $request)
    {
        $photos = Photo::paginate(8); 
        return view('guest.photo', ['photos' => $photos]);
    }

    public function photoDetail($code)
    {
        $photo = Photo::where('code', $code)->firstOrFail();
        $relatedPhotos = Photo::where('code', '!=', $code)->take(5)->get(); // Fetch 5 related photos
        return view('guest.photo-detail', compact('photo', 'relatedPhotos'));
    }

    public function videos(Request $request)
    {
        $videos = Video::paginate(8); 
        return view('guest.video', ['videos' => $videos]);
    }

    public function videoDetail($code)
    {
        $video = Video::where('code', $code)->firstOrFail();
        $relatedVideos = Video::where('code', '!=', $code)->take(5)->get(); // Fetch 5 related videos
        return view('guest.video-detail', compact('video', 'relatedVideos'));
    }

    public function ceremony()
    {
        $ceremony = Event::where('active', 1)->paginate(25); // Paginate ceremonies with 25 items per page
        return view('guest.ceremony', compact('ceremony'));
    }

    public function ceremonyDetail($id)
    {
        $ceremony = Event::where('id', $id)->where('active', 1)->firstOrFail(); // Fetch specific ceremony
        $relatedEvents = Event::where('id', '!=', $id)
                              ->where('active', 1)
                              ->take(5)
                              ->get(); // Fetch related ceremonies
        return view('guest.ceremony-detail', compact('ceremony', 'relatedEvents'));
    }

}

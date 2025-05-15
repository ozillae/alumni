<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Member;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Event; // Add this import for Event model

class GuestController extends Controller
{
    public function member(Request $request)
    {
        $query = Member::orderBy('id', 'desc');
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('division')) {
            $query->where('division', $request->division );
        }

        $members = $query->where('status', '3')->orderBy('name')->paginate(12); 
        $divisions = Division::where('active', 1)->orderBy('name')->get();
        $title = 'Daftar Anggota';

        return view('guest.member', compact('members', 'divisions', 'title'));
    }

    public function memberDetail($code)
    {
        $member = Member::where('code', $code)->firstOrFail();
        $member_portos = $member->portfolios()->get(); // Fetch related portfolios

        return view('guest.member-detail', ['member' => $member, 'member_portos' => $member_portos, 'title' => $member->name]);
    }

    public function photos(Request $request)
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(12); 
        return view('guest.photo', ['photos' => $photos, 'title' => 'Daftar Foto']);
    }

    public function photoDetail($code)
    {
        $photo = Photo::where('code', $code)->firstOrFail();
        $relatedPhotos = Photo::where('code', '!=', $code)->inRandomOrder()->take(5)->get(); // Fetch 5 related photos
        $title = $photo->name;

        return view('guest.photo-detail', compact('photo', 'relatedPhotos', 'title'));
    }

    public function videos(Request $request)
    {
        $videos = Video::orderBy('id', 'desc')->paginate(12); 
        return view('guest.video', ['videos' => $videos, 'title' => 'Daftar Video']);
    }

    public function videoDetail($code)
    {
        $video = Video::where('code', $code)->firstOrFail();
        $relatedVideos = Video::where('code', '!=', $code)->inRandomOrder()->take(5)->get(); // Fetch 5 related videos
        $title = $video->name;

        return view('guest.video-detail', compact('video', 'relatedVideos', 'title'));
    }

    public function ceremony()
    {
        $ceremony = Event::orderBy('id', 'desc')->where('active', 1)->paginate(12); 
        $title = 'Daftar Kegiatan';

        return view('guest.ceremony', compact('ceremony', 'title'));
    }

    public function ceremonyDetail($id)
    {
        $ceremony = Event::where('id', $id)->where('active', 1)->firstOrFail(); // Fetch specific ceremony
        $relatedEvents = Event::where('id', '!=', $id)
                              ->where('active', 1)
                              ->inRandomOrder()
                              ->take(5)
                              ->get(); // Fetch related ceremonies
        $title = $ceremony->name;

        return view('guest.ceremony-detail', compact('ceremony', 'relatedEvents', 'title'));
    }

}

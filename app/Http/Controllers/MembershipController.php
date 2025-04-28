<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\City;
use App\Models\Division;
use App\Models\Province;
use App\Models\User;

use Auth;

class MembershipController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if($user->member == null){
            return redirect('member/dashboard');
        }

        $member = Member::findOrFail(auth()->user()->member);
        $portofolios = $member->portfolios; 

        return view('member.index', compact('member', 'portofolios'));
    }

    public function first()
    {
        $user = auth()->user();
        $provinces = Province::all();
        $cities = array();
        $divisions = Division::where('active', 1)->get();
        
        return view('member.first', compact('user', 'provinces', 'cities', 'divisions'));
    }

    public function saveMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'address' => 'required|string',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|max:100',
            'province' => 'required|string|max:10',
            'city' => 'required|integer',
            'division' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $model = new Member();
        $model->code = generateCodeUnique();
        $model->joint_date = date("Y-m-d");

        $model->name = $request->get('name');
        $model->email = $request->get('email');
        $model->phone = $request->get('phone');
        
        $model->division = $request->get('division');
        $model->province = $request->get('province');
        $model->city = $request->get('city');
        
        $model->status = '1';
        $model->address = $request->get('address');
        $model->description = $request->get('description');

        $model->created_by = Auth::user()->id;
        $model->updated_by = Auth::user()->id;
        $model->created_at = date("Y-m-d H:i:s");
        $model->updated_at = date("Y-m-d H:i:s");

        $model->save();

        $user = User::find(Auth::user()->id);
        $user->member = $model->id;
        $user->save();

        return redirect('/dashboard');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'file_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $member = Member::where('code', $request->get('code'))->first();
        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        if ($request->hasFile('file_profil')) {
            //$file = $request->file('file_profil');
            //$path = $file->store('profile_photos', 'public');

            $ext = $request->file_profil->getClientOriginalExtension();

            if(in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'pdf'])){

                $image = 'profile-'.$member->code.'-pp-'.time().'.' . $ext;
                $request->file_profil->move(public_path('member-files'), $image);


            // Delete the old profile photo if it exists
                if(file_exists(asset('member-files/'.$member->file_profil))) {
                    
                }

                $member->file_profil = $image;
                $member->save();

                return redirect()->route('membership.index')->with('success', 'Profile photo uploaded successfully');
            } else {
                return redirect()->route('membership.index')->with('error', 'File extension not allowed');
            }
        }

        return back()->with('error', 'Failed to upload photo');
    }

    public function formPhoto(Request $request)
    {
        $member = Member::where('code', $request->get('code'))->first();
        if (!$member) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        return view('member.form-photo', compact('member'));
    }

    public function formUpdateMember()
    {
        $user = auth()->user();
        $member = Member::findOrFail($user->member);

        $provinces = Province::all();
        $cities = City::where('province', $member->province)->get();
        $divisions = Division::where('active', 1)->get();
        
        return view('member.update-member', compact('member', 'provinces', 'cities', 'divisions'));
    }

    public function UpdateMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'address' => 'required|string',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|max:100',
            'province' => 'required|string|max:10',
            'city' => 'required|integer',
            'division' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $user = auth()->user();
        $model = Member::where('id', $user->member)->first();

        if(!$model) {
            return redirect()->route('membership.index')->with('error', 'Data member tidak ditemukan');
        }

        $model->name = $request->get('name');
        $model->email = $request->get('email');
        $model->phone = $request->get('phone');
        
        $model->division = $request->get('division');
        $model->province = $request->get('province');
        $model->city = $request->get('city');
        
        $model->address = $request->get('address');
        $model->description = $request->get('description');

        $model->updated_by = Auth::user()->id;
        $model->updated_at = date("Y-m-d H:i:s");

        $model->save();

        return redirect()->route('membership.index')->with('success', 'Data member telah berhasil diupdate.');
    }
}

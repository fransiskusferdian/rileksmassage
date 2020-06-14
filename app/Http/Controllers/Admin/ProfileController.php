<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\ProfileRequest;
use App\Http\Requests\Admin\AboutRequest;
use App\Http\Requests\Admin\TeamRequest;
use App\Profile;
use App\Team;
use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $items = Profile::all();

        foreach ($items as $item) {
             $item;
        }

        return view('pages.admin.profile.index', [
            'item' => $item
        ]);
    }

    public function about() 
    {
        $items = About::all();

        foreach ($items as $item) {
             $item;
        }

        return view('pages.admin.profile.about', [
            'item' => $item
        ]);
    }

    public function team() 
    {
        $items = Team::all();

        return view('pages.admin.team.index', [
            'items' => $items
        ]);
    }

    public function editteam(Team $team)
    {    
        return view('pages.admin.team.edit', ['team' => $team]);
    }

    public function createteam() 
    {
        return view('pages.admin.team.create');
    }

    public function storeteam(TeamRequest $request)
    {
        $data =$request->all();

        if($request->image) {
        $path = 'public/assets/team/';
        $img = $data['image']->getClientOriginalName();
        $data['image'] = $path.$img;
        Storage::putFileAs($path, $request->file('image'), $img); 
       }

        Team::create($data);

        return redirect()->route('team')->withSuccess('Team member added!');   
    }


    public function updateteam(TeamRequest $request, Team $team)
    {
        $data =$request->all();

        $item = Team::findOrFail($team->id);

        if($request->image) {
            $path = 'public/assets/team/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('team')->withSuccess('Team member updated!');;    
    }

     public function deleteteam($id)
    {   
        $team = Team::findOrFail($id);
        $deleteimage = Storage::delete($team->image);
        $team->delete();
        return redirect()->route('team')->withDanger('Team member removed!');;    
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $data = $request->all();
        
        $item = Profile::findOrFail($id);
        $item->update($data); 
        return redirect()->route('profile.index')->withSuccess('Profile updated!');;
    }


    public function updateabout(AboutRequest $request, $id)
    {
        $data = $request->all();
        $item = About::findOrFail($id);

        if($request->image) {
            $path = 'public/assets/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 
       
        return redirect()->route('about')->withSuccess('About updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

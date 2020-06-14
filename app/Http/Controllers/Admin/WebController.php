<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Http\Requests\Admin\BannerRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function banner()
    {       
        $items = Banner::all();
        return view('pages.admin.banner.index', [
            'items' => $items
        ]);
    }

    public function createbanner()
    {      
         return view('pages.admin.banner.create');
    }

    public function editbanner(Banner $banner)
    {    
        return view('pages.admin.banner.edit', ['banner' => $banner]);
    }

    public function storebanner(BannerRequest $request)
    {
        $data =$request->all();
        $path = 'public/assets/banner/';
        $img = $data['image']->getClientOriginalName();
        $data['image'] = $path.$img;

        Storage::putFileAs($path, $request->file('image'), $img); 
        Banner::create($data);

        return redirect()->route('banner')->withSuccess('Banner created!');;    
    }

    public function updatebanner(Request $request, Banner $banner)
    {
        $data =$request->all();

        $item = Banner::findOrFail($banner->id);

        if($request->image) {
            $path = 'public/assets/banner/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('banner')->withSuccess('Banner updated!');;    
    }

    public function deletebanner($id)
    {   
        $banner = Banner::findOrFail($id);
        $deleteimage = Storage::delete($banner->image);
        $banner->delete();
        return redirect()->route('banner')->withDanger('Banner removed!');;    
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
    public function update(Request $request, $id)
    {
        //
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

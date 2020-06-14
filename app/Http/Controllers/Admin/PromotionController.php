<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Promotion;
use App\Profile;
use App\Http\Requests\Admin\PromotionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Promotion::all();
        return view('pages.admin.promotion.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        $phone = Profile::first()->phone;
        $data = $request->all();
        $image = $request->file('image');
        $img = $image->getClientOriginalName();
        $path = 'public/events/';
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $path.$img;
        $data['link'] =  str_replace(' ', '%20', 'https://wa.me/'.$phone.'?text='.$request->link);  

        Storage::putFileAs($path, $image, $img); 
        Promotion::create($data);

        return redirect()->route('promotion.index')->withSuccess('Promotion created!');;    

        // return redirect()->route('promotion')->withSuccess('Banner created!');;  
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
    public function edit(Promotion $promotion)
    {
        return view('pages.admin.promotion.edit',['promotion' => $promotion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, Promotion $promotion)
    {
        $data =$request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Promotion::findOrFail($promotion->id);

        if($request->image) {
            $path = 'public/events/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('promotion.index')->withSuccess('Promotion updated!');;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion = Promotion::findOrFail($promotion->id);
        $deleteimage = Storage::delete($promotion->image);
        $promotion->delete();
        return redirect()->route('promotion.index')->withDanger('Promotion removed!');;    
    }
}

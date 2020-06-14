<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Http\Requests\Admin\GalleryRequest;
use App\Portfolio;
use App\Category;
use App\Subcategory;
use App\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Portfolio::with(['category'])
                ->orderBy('id', 'desc')
                ->get();
    
        return view('pages.admin.portfolio.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Subcategory::where('category_id', 1)->get();
        return view('pages.admin.portfolio.create', ['categories' => $categories ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['directory'] =  str_replace(' ', '', $request->name.uniqid());  

        $directory = Storage::makeDirectory('public/Portfolio/'.$data['directory']);
        $path = 'public/Portfolio/'.$data['directory'];
        $category = $request->sub_category_id;
              
        Portfolio::create($data);

        if($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $image) {
                          
                $img = $image->getClientOriginalName();
                $db_img = $path.'/'.$img;
                Storage::putFileAs($path, $image, $img); 

                $data = [
                    'image' => $db_img,
                    'directory' => $data['directory'],
                    'is_thumbnail' => 0,
                    'sub_category_id' => $category,
                    
                ];
                Gallery::create($data);
            }
           $default =  Gallery::where('directory', $data['directory'])->first();
           $default->is_thumbnail = 1;
           $default->save();
            
        }

         return redirect()->route('portfolio.index')->withSuccess('Portfolio created!');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($directory)
    {
        $items = Gallery::where('directory', $directory)->get();
        // $dir = 'public/Portfolio/'.$directory.'/';
        // $items = Storage::allFiles($dir);
      
        return view('pages.admin.portfolio.gallery', [
            'items' => $items,
            'directory' => $directory
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();

       return view('pages.admin.portfolio.edit', [
            'portfolio' => $portfolio,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $id = $portfolio->id;

        $item = Portfolio::findOrFail($id);
        $item->update($data); 
        return redirect()->route('portfolio.index')->withSuccess('Portfolio updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $dir = $portfolio->directory;
        $gallery = Gallery::where('directory', $dir);

        $deletedirectory = Storage::deleteDirectory('public/Portfolio/' . $dir);


        $gallery->delete();
        $portfolio->delete();
        return redirect()->route('portfolio.index')->withDanger('Portfolio removed!');;
    }

    public function deleteimage($id)
    {
        $image = Gallery::findOrFail($id);
        $directory = $image->directory;
       
        $deleteimage = Storage::delete($image->image);
        $image->delete();
        
        return redirect()->route('portfolio', $directory)->withDanger('Image removed!');;
    }

    public function addimages(Request $request, $directory)
    {
        $path = 'public/Portfolio/'.$directory;
        $category = Portfolio::where('directory', $directory)->first()->category_id;

        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $image){
                $img = $image->getClientOriginalName();
                $db_img = $path.'/'.$img;
                Storage::putFileAs($path, $image, $img); 

                $data = [
                    'image' => $db_img,
                    'directory' => $directory,
                    'category_id' => $category,
                ];
                Gallery::create($data);

            }
        }
        return redirect()->route('portfolio', $directory)->withSuccess('Images added!');;
    }

}

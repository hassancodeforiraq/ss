<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request\has_File;
use App\Materal;
use App\Product;
use App\Tag;

class MateralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$go = Materal::all();
        // return view('layouts.go')->with('materalsk',$go);
        return view('materals/index',['materals' => Materal::all()]);
        // return View::make('layouts/go', compact('materalsk', $go));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::all();
        if ($products->count() == 0) {
            return redirect()->route('products');
        }

        $tags = Tag::all();
        if ($tags->count() == 0) {
            return redirect()->route('tag.add');
        }

        return view('materals.add')->with('products',$products)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'many' => 'required',
            'product_id' => 'required',
            'photo' => 'required|image',
            'tags' => 'required'
        ]);

        $img = $request->photo;
        $image = time().$img->getClientOriginalName();
        $img->move('uploaded/img',$image);

        $materals = Materal::create([
            'name'  => $request->name,
            'many'  => $request->many,
            'product_id'  => $request->product_id,
            'photo' => 'uploaded/img/'.$image,
            'slug'  => str_slug($request->name) // Slug
        ]);
        
        $materals->tag()->attach($request->tags); // Tags
        //dd($materals->all());
        // $materal = new Materal;
        // $materal->name = $request->name;
        // $materal->many = $request->many;
        // $materal->photo = $request->photo;
        // $materal->save();
        return redirect()->back();
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
        
        $materal = Materal::find($id);
        $product = Product::all();
        $tags = Tag::all();
        
        return view('materals.edit')->with('materal', $materal)->with('products', $product)->with('tags',$tags);
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
        $materal = Materal::find($id);
        $this->validate($request,[
            'name' => 'required',
            'many' => 'required',
            'product_id' => 'required'
            // 'photo' => 'required|image'
            ]);
            
            if($request->hasFile('photo')) {
                $img = $request->photo;
                $image = time().$img->getClientOriginalName();
                $img->move('uploaded/img/',$image);
                
                $materal->photo = 'uploaded/img/'.$image;
                //dd($img);
            }
            // dd($materal->whereBetween('id',array(1,3))->get());
            // dd($materal->where('name',$request->name)->get());

            
            
            $materal->name = $request->name;
            $materal->many = $request->many;
            $materal->product_id  = $request->product_id;
            $materal-> save();
            
            
            $materal->tag()->sync($request->tags); // Tag = function in model materal

            // return redirect()->route('materals');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materal = Materal::find($id);
        $materal->delete();
        return redirect()->route('materals');
    }

    public function trashed() // Delete Trashed Materal and create history and Don't need id becouse get all data 
    {
        $materal = Materal::onlyTrashed()->get();
        //dd($materal);
        return view('materals.softdeleted')->with('materals',$materal);
    }

    public function hdelete($id) // Delete Materal forever 
    {
        $materal = Materal::withTrashed()->where('id',$id)->first();
        $materal->forceDelete();
        return redirect()->back();
    }

    public function restore($id) // Restoe Materal and null history 
    {
        $materal = Materal::withTrashed()->where('id',$id)->first();
        $materal->restore();
        return redirect()->route('materals'); 
    }
}

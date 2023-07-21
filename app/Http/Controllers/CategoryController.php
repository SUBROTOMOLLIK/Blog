<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view("backend.category.index", 
        ['category' => $category,
         'title' => 'All Category',
         'meta_des' => 'This is meta description for all categories'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.category.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'title'=>'required|string|max:255',
       ]);

       if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('img/catimg/');
            $image->move($dest,$reImage);
        }else{
            $reImage='na';
        }

       $category = new Category;
       $category->title=$request->title;
       $category->detail=$request->detail;
       $category->image=$reImage;
       $category->save();

       return redirect('admin/category/create')->with('success','Category has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.update',['category'=>$category]);
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
        $request->validate([
            'title'=>'required|string|max:255',
       ]);

       if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('img/catimg/');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->cat_image;
        }

        $category=Category::find($id);
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();


       return redirect('admin/category/'.$id.'/edit')->with('success','Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::where('id',$id)->delete();

        return redirect('admin/category/')->with('success','Category has been Deleted');
    }
}

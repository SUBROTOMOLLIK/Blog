<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Sidebar;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sidebar = Sidebar::all();
        return view("backend.sidebar.index",
        ['sidebar' => $sidebar,
         'title' => 'All Sidebar',
         'meta_des' => 'This is meta description for all sidebars'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.sidebar.add");
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
            'detail'=>'required',
            'value'=>'min:1|max:2',
       ]);

       if($request->hasFile('sidebar_image')){
        $image=$request->file('sidebar_image');
        $SideImage=time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('img/sidebar_img/');
        $image->move($dest,$SideImage);
      }else{
         $SideImage='na';
       }

       $sidebar = new Sidebar;
       $sidebar->title=$request->title;
       $sidebar->value=$request->value;
       $sidebar->detail=$request->detail;
       $sidebar->image=$SideImage;
       $sidebar->save();

       return redirect('admin/sidebar/create')->with('success','Sidebar has been Created');

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
        $sidebar = Sidebar::find($id);
        return view('backend.sidebar.update',['sidebar'=>$sidebar]);
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
            'detail'=>'required',
            'value'=>'min:1|max:2',
       ]);

       if($request->hasFile('sidebar_image')){
        $image=$request->file('sidebar_image');
        $SideImage=time().'.'.$image->getClientOriginalExtension();
        $dest=public_path('img/sidebar_img/');
        $image->move($dest,$SideImage);
      }else{
         $SideImage=$request->sidebar_image;
       }

       $sidebar = Sidebar::find($id);
       $sidebar->title=$request->title;
       $sidebar->value=$request->value;
       $sidebar->detail=$request->detail;
       $sidebar->image=$SideImage;
       $sidebar->save();

       return redirect('admin/sidebar/'.$id.'/edit')->with('success','Sidebar has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sidebar=Sidebar::where('id',$id)->delete();
        return redirect('admin/sidebar/')->with('success','Sidebar has been Deleted');
    }
}

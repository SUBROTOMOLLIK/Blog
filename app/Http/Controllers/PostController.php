<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view("backend.posts.index",
        ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();
        return view('backend.posts.add',['cate'=>$cate]);
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
            'category'=>'required',
            'title'   =>'required|string|max:255',
            'detail'   =>'required',
        ]);

        //post thumbnail
        if ($request->hasFile('post_thumb')){
            $image1 =$request->file('post_thumb');
             $post_thumb = time().'.'.$image1->getClientOriginalExtension();
            $post_des1 =public_path('img/thumb/');
            $image1->move($post_des1,$post_thumb);
        }else{
            $post_thumb = 'na';
        }
        // full post image
        if ($request->hasFile('post_image')){
            $post_image =$request->file('post_image');
            $post_img = time().'.'.$post_image->getClientOriginalExtension();
            $post_des2 =public_path('img/post/');
            $post_image->move($post_des2,$post_img);
        }else{
            $post_img = 'na';
        }

        $post=new Post;
        $post->user_id=0;
        $post->cate_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$post_thumb;
        $post->full_img=$post_img;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();

        return redirect('admin/post/create')->with('success','Data has been added');
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
        $cate = Category::all();
        $post = Post::find($id);
        return view('backend.posts.update',['cate'=>$cate,'post'=>$post]);
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
            'category'=>'required',
            'title'   =>'required|string|max:255',
            'detail'   =>'required',
        ]);

        //post thumbnail
        if ($request->hasFile('post_thumb')){
            $image1 =$request->file('post_thumb');
             $post_thumb = time().'.'.$image1->getClientOriginalExtension();
            $post_des1 =public_path('img/thumb/');
            $image1->move($post_des1,$post_thumb);
        }else{
            $post_thumb = $request->post_thumb;
        }
        // full post image
        if ($request->hasFile('post_image')){
            $post_image =$request->file('post_image');
            $post_img = time().'.'.$post_image->getClientOriginalExtension();
            $post_des2 =public_path('img/post/');
            $post_image->move($post_des2,$post_img);
        }else{
            $post_img = $request->post_image;
        }

        $post=Post::find($id);
        $post->cate_id=$request->category;
        $post->title=$request->title;
        $post->thumb=$post_thumb;
        $post->full_img=$post_img;
        $post->detail=$request->detail;
        $post->tags=$request->tags;
        $post->save();

        return redirect('admin/post/'.$id.'/edit')->with('success','Post data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::find($id);
        $delete->delete();

        return redirect('admin/post/')->with('success','Post data has been deleted');
    }
}

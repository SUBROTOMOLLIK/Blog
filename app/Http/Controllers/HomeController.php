<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Sidebar;

class HomeController extends Controller
{
   public function index(Request $request){
       if ($request->has('q')){
        $query = $request->q;
        $data = Post::where('title','LIKE','%'.$query.'%')->orderBy('id','desc')->paginate(4);
       }else{
        $data = Post::orderBy('id','desc')->paginate(4);
       }
       $sidebar = Sidebar::where('value','1')->get();

       return view('home',compact(['data','sidebar']));
   }


   // details page function

   public function detail(Request $request, $id){
    Post::find($id)->increment('views');
    $data = Post::find($id);
    return view('detail',['data'=>$data]);
   }

    // /******* Laravel Logo ******/

    //    public function logo(){
    //     return view('backend.comment.index');
    //    }

    // /****** Laravel Logo ******/

   /*****show post according to category****/
   public function category(Request $request, $id)
   {
       $category = Category::find($id);
       $data = Post::where('cate_id',$id)->orderBy('id','desc')->paginate(4);
       return view('category',
       ['data'=>$data,'category' => $category]);
   }
   /*****show post according to category****/

   /*****save user post****/
   public function save_post_form(){
    $cate= Category::all();
    return view('save_post',['cate'=>$cate]);
   }
   /*****save user post****/

   /****Store user post */
   public function save_post_data(Request $request)
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
       $post->user_id=$request->user()->id;
       $post->cate_id=$request->category;
       $post->title=$request->title;
       $post->thumb=$post_thumb;
       $post->full_img=$post_img;
       $post->detail=$request->detail;
       $post->tags=$request->tags;
       $post->status=1;
       $post->save();

       return redirect()->route('savepost')->with('success','Data has been added');
   }
   /****Store user post */


   /***Manage User Post frome forent end */
   public function manage_post(Request $request){
    $data = Post::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
    return view('manage_post',['data' => $data]);
   }
   /***Manage User Post frome forent end */

   // all category
   public function allCategory()
   {
       $categories = Category::orderBy('id','desc')->paginate(6);
        return view('allcategory',
       ['categories' => $categories]);
   }
   // all categoery

   // submit comment in post
   public function submit_comment(Request $request, $id){
        $request->validate([
            'comment'=>'required|string'
        ]);

        $data = new Comment;
        $data->user_id = $request->user()->id;
        $data->post_id= $id;
        $data->comment= $request->comment;
        $data->save();

        return redirect('detail/'.$id)->with('success','comment add successfuly');
   }

   // show all comment in admin
   public function comment(){
    $data = Comment::all();
    return view('backend.comment.index',['data'=> $data]);
   }

   // delete comment from database

   public function delete_comment($id){
    $delete = Comment::find($id);
    $delete->delete();
    return redirect('admin/comment')->with('success','comment deleted successfuly');
   }


}

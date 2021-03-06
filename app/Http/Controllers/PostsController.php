<?php

namespace App\Http\Controllers;

//auth must be cited to get user type in create function
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use App\Post;
use App\Models\Miss;
use App\Models\Ptmiss;
use App\Models\Massage;
use App\Models\Contract;
use App\Models\Baoyang;
use App\Models\More;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
       // $posts = Post::where('status','free')->get();
        $posts = Miss::orderBy('uname','asc')->get();
        //$posts = Post::orderBy('name','asc')->get();
        
        return view('posts.index')->with('posts', $posts);
        
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //Get the currently authenticated user's type


        //*********************** important!!!!
        $user_type=Auth::user()->utype;
        $ucountry=Auth::user()->ucountry;
        $uname=Auth::user()->username;
            switch($user_type){
                case('miss'):
                    return view('misss.miss_create')->with('ucountry',$ucountry)->with('uname',$uname);
                    break;
                case('massage'):
                    return view('massages/massage_create');
                    break;
                case('ptmiss'):
                    return view('ptmisss.ptmiss_create')->with('uname',$uname)
                    ->with('ucountry',$ucountry);
                    break;
                case('contract'):
                    return view('contracts/contract_create')->with('uname',$uname)->with('ucountry',$ucountry);
                    break;
                case('baoyang'):
                    return view('baoyangs/baoyang_create')->with('uname',$uname)->with('ucountry',$ucountry);
                    break;
                case('more'):
                    return view('mores/more_create');
                    break;
                
                
            }
            
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        
        $user_type=Auth::user()->utype;
        
        switch($user_type){
            case('miss'):
                return redirect('/miss/'.$id.'/edit');
                break;
            case('massage'):
                $post= Massage::find($id);
                break;
            case('ptmiss'):
                $post= Miss::find($id);
                
                break;
            case('baoyang'):
                return redirect('/baoyangs/'.$id.'/edit');
                
                break;
            case('more'):
                $post= More::find($id);
                break;
        }
       
        //$post= Post::find($id);
        /*
        if(auth()->user()->id!=$post->user_id){
            return redirect('/posts')->with('error','unathorized page');
        }

        return view('posts.edit')->with('post',$post);
        */
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
        $this->validate($request, [
            'name' => 'required',
            'intro' => 'required'
        ]);
           // Create Post
        $post= Post::find($id);
        $post->name = $request->input('name');
        $post->uid = $request->input('uid');
        $post->intro = $request->input('intro');
        $post->type = $request->type;
        $post->status = 'free';
        //$post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        if(auth()->user()->id!=$post->user_id){
            return redirect('/posts')->with('error','unathorized page');
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post removed');
        

    }
}
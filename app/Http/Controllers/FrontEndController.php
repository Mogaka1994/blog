<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use Session;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index')->with('title',Setting::first()->site_name)
                            ->with('categories',Category::take(5)->get())
                            ->with('first_post',Post::orderBy('created_at','desc')->first())
                            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get())
                            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get())
                            ->with('career',Category::find(4))
                            ->with('tutorials',Category::find(3))
                            ->with('settings',Setting::first());
    }
    public function singlePost($slug){
        $post=Post::where('slug',$slug)->first());
        $next_id=Post::where('id','>',$post->id);
        $prev_id=Post::where('id','<',$post->id);
        return view('single')->with('post',$post)
                        ->with('title',$post->title)
                        ->with('settings',Setting::first())
                        ->with('categories',Category::take(5)->get())
                        ->with('next',Post::find($next_id))
                        ->with('prev',Post::find($prev_id))
                        ->with('tags',Tag::all());;
    }
    public function category($id){
        $category=Category::find($id);
        return view('category')->with('category',$category)
                               ->with('title',$category->name)
                               ->with('categories',Category::take(5)->get())
                               ->with('settings',Setting::first());
    }

}

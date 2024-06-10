<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    function index(){
        $blogs=DB::table('blogs')->get();
        return view('blog',compact('blogs'));
    
    }
    function about(){
        $name="LnwAaum";
        $date=" 21 พฤษภาคม 2567";
        return view('about',compact('name','date'));
    
    }
    function create(){
        return view('form');
    }
    function insert(Request $request){
        $request->validate(
            [

            'title'=>'required|max:50',
            'content'=>'required'
            ],
        [
            'title.required'=>'กรุณาป้อนชื่อบทความ',
            'title.max'=>'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
            'content.required'=>'กรุณาป้อนเนื้อหาบทความของคุณ'
        ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('blogs')->insert($data);
        return redirect('/blog');
    }

    function delete($id){
        DB::table('blogs')->where('id',$id)->delete();
        return redirect('/blog');
    }

    function change($id){
        $blog=DB::table('blogs')->where('id',$id)->first();
        $data=[
            'status'=>!$blog->status
        ];
        $blog=DB::table('blogs')->where('id',$id)->update($data);
        return redirect('/blog');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    function __constructor(){
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $comment = new Comment();
            $comment->text = $request->text;
            $comment->iduser = Auth::id();
            $comment->idreview = $request->idreview;
            $comment->save();
            return redirect('review/' . $request->idreview);
        }catch(\Exception $e){
            return back()
                ->withInput()
                ->withErrors(['message' => 'Verify your account first']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if($comment->iduser == Auth::id()){
            return view('comment.edit', ['comment' => $comment]);
        }else{
            return back()->withErrors(['message' => 'You can not edit other people comments']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->iduser == Auth::id()){
            try{
                $comment->text = $request->text;
                $comment->update();
                return redirect('review/' . $comment->idreview);
            }catch(\Exception $e){
                return back()
                    ->withInput()
                    ->withErrors(['message' => 'An unexpected error occurred while updating.']);
                }
        }else{
            return back()->withErrors(['message' => 'You can not edit other people comments']);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->iduser == Auth::id()){
            try{
                $comment->delete();
                return redirect('review/' . $comment->idreview);
            }catch(\Exception $e){
                return back()
                    ->withInput()
                    ->withErrors(['message' => 'An unexpected error occurred while deleting.']);
            }
        }else{
            return back()->withErrors(['message' => 'You can not delete other people comments']);
        }
    }
}

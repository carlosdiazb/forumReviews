<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;
use App\Http\Requests\UserEditRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::id() == $user->id){
            return view('user.edit', ['user' => $user]);
        }else{
            return back()->withErrors(['message' => 'You can not edit other users data']);
        }
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    
    public function update(UserEditRequest $request, User $user){
        if($user->id == Auth::user()->id){
        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            return redirect('user/' . Auth::id() . '/edit');
        }catch(\Exception $e){
            return back()->withInput->withErrors(['message' => 'Try again']);
        }
        }else{
            return back()->withErrors(['message' => 'You can not edit other people profile']);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id == Auth::id()){
             try{
                foreach($user->reviews as $review){
                    $imgs = Image::where('idreview', $review->id)->get();
                    foreach($imgs as $img){
                        $name = $img->name;
                        Storage::disk('local')->delete('public/images/' . $name);
                    }
                }
                $user->delete();
                Auth::logout();
                return redirect('review');
            }catch(\Exception $e){
                return back()->withErrors();
                ['default' => 'Compruebe algo'];
            }
        }else{
            return back()->withErrors(['message' => 'You can not edit other people profile']);
        }
    }
    
    
    public function index2()
    {
        return view('home');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}

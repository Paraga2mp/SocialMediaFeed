<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $themes = \App\Models\Theme::all();
        // dd($themes);
        return view('themes.index', compact('themes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::orderBy('name')->get();
        // dd($themes);
        return view('themes.create', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $data= request()->validate([
            'name' => 'required',
            'cdn_url' => 'required',
        ]);
    
        auth()->user()->themes()->create($data);
  
        return redirect()->route('themes.index')
                        ->with('success','Theme created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id); //call to the model
      
        $theme = Theme::find($id);
        return view('themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit')->with([
            'theme'=>$theme,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required',
            'cdn_url' => 'required',
        ]);


        $theme->name = $request->name;
        $theme->cdn_url = $request->cdn_url;
        $theme->save();
    
        return redirect()->route('themes.index')
                        ->with('success','theme updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);

        if($theme->id != 0)
        {
            $theme->delete();
        }
        else
        {
            session()->flash('status', 'Unable to delete the theme');
        }

        return redirect('themes');
    }
    
}

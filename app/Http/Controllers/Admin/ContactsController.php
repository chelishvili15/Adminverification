<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ContactsController extends Controller
{
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
        //
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

        $item = DB::table('contacts')->first();
        
        return view('admin.contact.edit', compact('item'));
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
        // ვალიდაცია
        $this->validate($request, [
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);
        
        $update = $update = DB::table('contacts')->where('id',$id)->update([
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        
        $request->session()->flash('result', true);
        
        return redirect()->back(); 
    }

    public function cache(Request $request)
    {
        // თუ საკონტაქტო ინფორმაცია უკვე შენახულია ქეშში
        if(Cache::has('contacts'))
        {
            // წავშალოთ იგი
            Cache::forget('contacts');
        }
        else // თუ არადა 
        {
            // შევინახოთ 
            Cache::remember('contacts', 3600, function () {
                return DB::table('contacts')->first();
            });
        }
        
        $request->session()->flash('result', true);
        
        return redirect()->back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Admin::all(); // ყველა ჩანაწერის ამოღება admins ცხრილიდან
        return view('admin.admins.index', compact('items')); // მივამაგროთ ინფორმაცია და დავაბრუნოთ წარმოდგენის ფაილი
    }

    
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * ადმინისტრატორის შენახვა ბაზაში
     */
    public function store(Request $request)
    {
        // ვალიდაცია
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
            'email' => 'required|email|max:255|unique:admins',
        ]);

        $store = Admin::store($request); // true ან false
        
        $request->session()->flash('result', $store);
        
        return redirect()->route('admins.index');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $item = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('item'));
    }

    //ადმინების განახლება მბში
    public function update(Request $request, $id)
    {
        // ვალიდაცია
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
        ]);
        
        $item = Admin::findOrFail($id);
        $update = Admin::updateItem($request, $item); // true ან false
        $request->session()->flash('result', $update);
        
        return redirect()->back();      
    }

    // ადმინების წაშლა
    public function destroy(Request $request, $id)
    {
        if($id == 1)
        {
            return redirect()->back();  
        }
        
        $delete = Admin::find($id)->delete();
        $request->session()->flash('result', $delete);
        
        return redirect()->back();
    }
}

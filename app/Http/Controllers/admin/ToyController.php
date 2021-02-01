<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Toy;

class ToyController extends Controller
{
    
	/*
	Method Name:    getList
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To get list of all toys
    Params:         
     */
    public function getList(Request $request)
    {
        $data = Toy::with(['booking'])->orderby('id')->paginate(15);
        return view('admin.toys.list', compact('data'));
    }
    /* End method getList */

	/*
	Method Name:    store
    Developer:      Shine Dezign
    Created Date:   2021-02-01 (yyyy-mm-dd)
    Purpose:        To save toys detail into database
    Params:         
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(Toy::$createRules);

        try{
            $data = array(
                'name' => $request->name,
                'price' => $request->price,
            );
            $toy = Toy::create($data);
            return redirect()->back()->with('status', 'success')->with('message', 'Toy has been created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('message', $e->getMessage());
        }
        
    }
    /* End method store */
}

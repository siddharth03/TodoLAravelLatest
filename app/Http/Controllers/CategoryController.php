<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\CreatecategoryRequest;
use App\Http\Requests\Request;
use function redirect;
use function view;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $category = new category();
        return view('category.add', compact('category'));
    }
    
    public function index()
    {
       $category = category::all();
       return view('category.index', compact('category'));
    }
    
    public function store(CreatecategoryRequest $request)
    {
        category::create($request->all());
        $controller = new MailController();
        $controller->email();
        return redirect()
        ->back()
        ->with('message', "Succesfully added in category.");
    }
    
    public function edit($id)
    {
        $category = category::find($id);
        return view('category.add', compact('category'));
    }
    
    public function update($id, Request $request)
    {
        $category = category::find($id)->update($request->toArray());
        return redirect()
        ->back()
        ->with('message', "Succesfully updated in category.");  
    }
    
    public function destroy($id)
    {
        $category = category::find($id)->delete();
        return redirect()
        ->back()
        ->with('message', "Succesfully deleted in category."); 
    }
    
}
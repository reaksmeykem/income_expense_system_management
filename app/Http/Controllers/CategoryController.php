<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        return view('category.create-category');
    }

    public function manage(){
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->latest()->get();
        return view('category.manage-category', compact('categories'));
    }

    public function store(Request $request){
        $category = new Category();
        $request->validate([
            'category' => 'required'
        ]);

        $category->category = $request->category;
        $category->user_id = Auth::guard('web')->user()->id;

        $category->save();
        return redirect()->route('manage_category')->with('success','Added Successfully.');
    }

    public function edit($id){
        $category_detail = Category::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        return view('category.edit-category', compact('category_detail'));
    }

    public function update($id, Request $request){
        $category = Category::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        $request->validate([
            'category' => 'required'
        ]);

        $category->category = $request->category;
        $category->update();

        return redirect()->route('manage_category')->with('success', 'Updated Successfully.');
    }

    public function delete($id){
        $category = Category::where('id', $id)->delete();
        return redirect()->route('manage_category')->with('success', 'Deleted Successfully.');
    }
}

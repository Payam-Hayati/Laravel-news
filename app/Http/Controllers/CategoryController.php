<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function add_category_form()
    {
        if (!login_validate())
            return redirect("/");
        $admin = Admin::find(Session::get("admin_id"));
        return view("admin.category.add", compact("admin"));
    }

    public function add_category_check(Request $request)
    {

        $title = $request->title;
        $this->validate(request(), ["title" => "required"]);
        Category::create(["title" => $title]);
        Session::flash("success_message", "Category Created Successfully");
        return redirect()->back();
    }


    public function show_categories()
    {
        if (!login_validate())
            return redirect("/");
        $admin = Admin::find(Session::get("admin_id"));
        //$category = Category::all();
        $categories = Category::latest('id')->paginate(10);
        //$category = News::paginate(2);
        return view("admin.category.show", compact("categories", "admin"));
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash("success_message", "Category Deleted Successfully!");
        return redirect()->back();
    }



    public function update_category_form(Category $category)
    {
        return view("admin.category.update", compact("category"));
    }

    public function update_category_check(Category $category, Request $request)
    {
        $this->validate(request(), ["title" => "required"]);
        $title = $request->title;
        $category->title = $title;
        $category->save();

        Session::flash("success_message", "Category Updated Successfully");
        return redirect()->back();
    }
}

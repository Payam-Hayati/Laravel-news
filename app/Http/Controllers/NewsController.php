<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function add_news_form()
    {
        if (!login_validate())
            return redirect("/");
        $admin = Admin::find(Session::get("admin_id"));
        $categories = Category::all();
        return view("admin.news.add", compact("categories", "admin"));
    }
    public function add_news_check(Request $request)
    {

        $title = $request->title;
        $image = $request->image;
        $category = $request->category;
        $description = $request->description;

        $my_id = Session::get('admin_id');
        //echo 'ID is:' . $my_id;

        if (isset($image)) {
            $image_size = $image->getSize() / 1024;
            if ($image_size > 1024) {
                Session::flash("error_message", "Image Size should be less than 1MB!");
                return redirect()->back();
            } else {
                $image_extension = $image->getClientOriginalExtension();
                //echo $image_extension;
                $extension_array = array("jpg", "png");
                if (in_array($image_extension, $extension_array)) {
                    $image_name = $image->getClientOriginalName();
                    $image_new_name = md5($image_name . microtime()) . substr($image_name, -5, 5);
                    $image->move("news_images", $image_new_name);
                    News::create(["title" => $title, "category_id" => $category, "admin_id" => Session::get('admin_id'), "description" => $description, "image" => $image_new_name, "date" => "1400/01/01", "state" => "1"]);
                    Session::flash("success_message", "News Created Successfully");
                    return redirect()->back();
                } else {
                    Session::flash("error_message", "Just JPG|PNG");
                    return redirect()->back();
                }
            }
        } else {
            Session::flash("error_message", "Please Select Image!");
            return redirect()->back();
        }
    }

    public function show_news()
    {
        //$news = News::all();
        //$news = News::paginate(2);

        if (!login_validate())
            return redirect("/");
        $admin = Admin::find(Session::get("admin_id"));
        $news = News::latest("id")->paginate(10);
        return view("admin.news.show", compact("news", "admin"));
    }

    public function delete_news($id)
    {
        $news = News::find($id);
        unlink("news_images/" . $news->image);
        $news->delete();
        Session::flash("success_message", "Record Deleted Successfully!");
        return redirect()->back();
    }


    public function update_news_form(News $news)
    {
        //echo $news;
        $categories = Category::all();
        return view("admin.news.update", compact("news", "categories"));
    }

    public function update_news_check(News $news, Request $request)
    {
        $title = $request->title;
        $image = $request->image;
        $category = $request->category;
        $description = $request->description;
        $this->validate(request(), ["title" => "required", "description" => "required"]);
        if (isset($image)) {
            $image_size = $image->getSize() / 1024;
            if ($image_size > 1024) {
                Session::flash("error_message", "لطفا یک تصویر با حجم کمتر از 1 مگابایت انتخاب کنید!");
                return redirect()->back();
            } else {
                $image_extension = $image->getClientOriginalExtension();
                $extension_array = array("jpg", "png");
                if (in_array($image_extension, $extension_array)) {
                    $image_name = $image->getClientOriginalName();
                    $image_new_name = md5($image_name . microtime()) . substr($image_name, -5, 5);
                    unlink("news_images/" . $news->image);
                    $image->move("news_images", $image_new_name);
                } else {
                    Session::flash("error_message", "لطفا یک تصویر با پسوند JPG یا PNG انتخاب کنید!");
                    return redirect()->back();
                }
            }
        } else {
            $image_new_name = $news->image;
        }
        $news->title = $title;
        $news->image = $image_new_name;
        $news->category_id = $category;
        $news->description = $description;
        $news->save();

        Session::flash("success_message", "News Updated Successfully");
        return redirect()->back();
    }
}

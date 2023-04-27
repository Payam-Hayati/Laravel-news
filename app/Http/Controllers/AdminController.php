<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{












    public function update_account_form()
    {
        $admin = Admin::find(Session::get("admin_id"));
        //echo $admin;
        return view("admin.account.update", compact("admin"));
    }

    public function update_account_check(Admin $admin, Request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $image = $request->image;
        $this->validate(request(), ["fname" => "required", "lname" => "required"]);
        if (isset($image)) {
            $image_size = $image->getSize() / 1024;
            if ($image_size > 1024) {
                Session::flash("error_message", "Size should be less than 1MB");
                return redirect()->back();
            } else {
                $image_extension = $image->getClientOriginalExtension();
                $extension_array = array("jpg", "png");
                if (in_array($image_extension, $extension_array)) {
                    $image_name = $image->getClientOriginalName();
                    $image_new_name = md5($image_name . microtime()) . substr($image_name, -5, 5);
                    if ($admin->profile != '')
                        unlink("admin_images/" . $admin->profile);
                    $image->move("admin_images", $image_new_name);
                } else {
                    Session::flash("error_message", "Just PNG | jpg");
                    return redirect()->back();
                }
            }
        } else {
            $image_new_name = $admin->profile;
        }
        $admin->fname = $fname;
        $admin->lname = $lname;
        $admin->profile = $image_new_name;
        $admin->save();

        Session::flash("success_message", "Account Updated Successfully");
        return redirect()->back();
    }


    public function panel()
    {
        if (Session::has("admin_id"))
            return view("admin.panel");
        else
            return redirect('login');
    }

    public function exit()
    {
        Session::forget('admin_id');
        return redirect('/');
    }
}

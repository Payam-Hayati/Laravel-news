<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\News;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function search(Request $request)
    {
        $search = $request->search;
        //echo $search;

        $economic = News::where("category_id", "1")->latest("id")->paginate(10);
        $sports = News::where("category_id", "2")->latest("id")->paginate(10);
        $international = News::where("category_id", "3")->latest("id")->paginate(10);
        $news = News::where("title", "like", "%" . $search . "%")->latest("id")->paginate(10);
        return view('search', compact("economic", "sports", "international", "news"));
    }
    public function login()
    {
        return view('login');
    }

    public function login_check(Request $request)
    {
        $this->validate(request(), ["username" => "required", "password" => "required"]);
        $username = $request->username;
        $password = $request->password;
        $admin_count = Admin::where(["email" => $username, "password" => $password])->count();


        if ($admin_count) {
            //echo "Hi Admin!";
            $admin = Admin::where(["email" => $username, "password" => $password])->first();
            Session::put("admin_id", $admin->id);
            $bingo = Session::put("admin_id", $admin->id);
            //echo $admin->id;
            return redirect("admin/panel");
        } else {
            Session::flash("message", "User not Found!");
            //session()->flash('message', 'User not Found!');
            return redirect()->back();
        }
    }

    public function index()
    {
        //$sports = News::where('category_id', "5")->get();
        $economic = News::where('category_id', "1")->latest('id')->paginate(3);
        $sports = News::where('category_id', "2")->latest('id')->paginate(3);
        $international = News::where('category_id', "3")->latest('id')->paginate(3);
        return view('index', compact('sports', 'economic', 'international'));
    }


    public function more(News $news)
    {
        $economic = News::where('category_id', "1")->latest('id')->paginate(3);
        $sports = News::where('category_id', "2")->latest('id')->paginate(3);
        $international = News::where('category_id', "3")->latest('id')->paginate(3);
        return view('more', compact('sports', 'economic', 'international', 'news'));
    }

    public function category($id)
    {

        $economic = News::where("category_id", "1")->latest("id")->paginate(10);
        $sports = News::where("category_id", "2")->latest("id")->paginate(10);
        $international = News::where("category_id", "3")->latest("id")->paginate(10);
        $news = News::where("category_id", $id)->latest("id")->paginate(10);
        return view('category', compact("economic", "sports", "international", "news"));
    }
}

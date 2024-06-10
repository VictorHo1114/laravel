<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return $this->redirect();
    }
    public function redirect()
    {
        $user = Auth::user();

        if ($user) {
            $usertype = $user->usertype;

            if ($usertype == '1') {
                return view('admin.home');
            } 
            else if($usertype == '0') {
                return view('home.userpage');
            }
        } 
        else {
            // Handle the case where there is no authenticated user
            return view('home.userpage'); // Redirect to login page or show a guest page
        }
    }
}


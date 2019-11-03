<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    // Main Index Page
	public function index(){
		return view ('Backend.pages.index');
	}

    /*Master page Show*/
    public function mastertemplate(){
    	return view ('Backend.layouts.mastertemplate');
    }
}

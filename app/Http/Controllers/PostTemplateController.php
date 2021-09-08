<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Templates;

class PostTemplateController extends Controller
{
    public function index(){
       return view('newtemplate');
    }
    public function post(Request $request){

        $validated = $request->validate([
            'Name' => 'required',
            'image' => 'required',
            'Category' => 'required',
            'code' => '',
            'Json' => '',
            'type' => 'required',
        ]);

        $template = new Templates;
        $template->Name = $request->Name;
        $template->image = $request->image;
        $template->Category = $request->Category;
        $template->code= $request->code;
        $template->Json=$request->Json;
        $template->type=$request->type;
        $template->save();
    }
}

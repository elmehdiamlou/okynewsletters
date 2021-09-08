<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Templates;
use App\Models\Events;
use App\Models\Offers;

class TemplatesController extends Controller
{
    public function index(){
        return view('buzzevents');
    }
    public function getBuzzeventsTemplates(){
        return Templates::where('type','Buzzevents')->get();
    }
    public function getITSkillsTemplates(){
        return Templates::where('type','ITSkills')->get();
    }
    public function getEvents(){
        return Events::all();
    }
    public function getOffers(){
        return Offers::all();
    }
}

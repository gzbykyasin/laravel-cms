<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\Config;
use App\Projects;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    protected $data=array();
    public function __construct()
    {

    }

    public function index(){
        $this->data['projeler']=Projects::all();
        $this->data['hizmetler']=Services::all();
        return view('frontend.projects',$this->data);
    }
}

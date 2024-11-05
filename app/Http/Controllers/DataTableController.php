<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DataTableController extends Controller
{

    public function serverside(Request $request) {
        
        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','&'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        if($request->get('tanggal')){
            $data = $data->where('name','LIKE','&'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('datatable.serverside',compact('data','request'));
    
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Atp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create(){
        if(backpack_auth()->check()) {
            
            return redirect(backpack_url(''));
        }

        $atp = Atp::all();
        $user = Auth::user();
        
        return view('welcome', compact('atp', 'user'));
    }

    public function store(ApplicationRequest $request){
        $data = Application::create($request->validated());
        
        return redirect()->route('get.application');
    }
}

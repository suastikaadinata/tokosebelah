<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Category;
use App\Iklan;
use App\Belanja;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function profile($id = null)
    {
        $edit = false;//1      

        if($id == null){ //2
            $user  = Auth::user();//3
            $edit  = true;//3
            $iklan = Iklan::where('user_id', Auth::user()->id)->where('isVerified', 1)->where('hapus', 0)->get();//3
        }else{//4
            $user  = User::findOrFail($id);//4
            $iklan = Iklan::where('user_id', $id)->where('isVerified', 1)->where('hapus', 0)->get();//4
        }//4
        
        return view('user.profile',[//5
            'user'          => $user,//5
            'edit'          => $edit,//5         
            'iklan'         => $iklan//5       
        ]);//5
        
    }

    public function edit()
    {       
        return view('user.edit-profile');                 
    }

    public function update(Request $request)
    {
        $user = Auth::user();//1

        $validation = [//2
            'name'          => 'required|string|max:255',//2
            'tanggal_lahir' => 'required|string',//2
            'biografi'      => 'string',//2
        ];

        $data = $request->all();//3

        if($user->email != $data['email']){//3
            $validation['email'] = 'required|string|email|max:255|unique:users';//4
        }//5

        if ($user->foto != null) {//5
            $validation['foto'] = 'image|max:2000';//6
        }//7

        $this->validate($request, $validation);//7
        $user->name         = $data['name'];//8
        $user->email        = $data['email'];//8
        $user->ttl          = Carbon::createFromFormat("d/m/Y", $data['tanggal_lahir'])->format("Y/m/d");//8
        $user->deskripsi    = $data['biografi']; //8
        if($request->hasFile('foto')){//8
            $files      = $request->file('foto');//9
            $path       = $files->store('profile', 'uploads');//9
            $user->foto = $path;//9
        }//10

        $user->save();//10

        return redirect('/profile');//11
    }

    public function hapusIklan($id)
    {
        $iklan = Iklan::findOrFail($id);
        $iklan->hapus();
        return redirect()->back();
    }
}

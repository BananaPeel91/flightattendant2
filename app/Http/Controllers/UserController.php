<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\Operator;
use App\Models\Airport;
use App\Models\JobApplicants;
use App\Models\User;
use App\Models\JobRoutes;
use App\Models\Aircraft;
use App\Models\ConfirmationStatus;
use Illuminate\Http\Request;
use App\Models\operatorUsers;
use Intervention\Image\imageManagerStatic as Image;

class userController extends Controller
{
    
    public function index()
    {
    }

    public function show(User $user)
    {

    	
    	$operatorUser = operatorUsers::where('user_id', $user->id)->first();
    	$jobApplications = JobApplicants::with('job')->where('user_id', $user->id)->get();
        $operators = Operator::all();

    	
    	


    	
    	return view('users.profile', compact('user','jobApplications', 'operatorUser','operators'));
    	}

     public function chooseoperator(Request $request)
    {
        $OperatorUser = OperatorUsers::create([
            'operator_id' => request('operator_id'),
            'user_id' => request('user_id'),
            ]);

        return redirect('/users/' . $request->user_id);
    }

    public function edit(User $user)
    {
        
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findUserById($request->user_id);

        if($request->has('name') && !is_null($request->name))

        $user->update([
                'name' => $request->name,
                
            ]);
         if($request->has('email') && !is_null($request->email))

        $user->update([
                'email' => $request->email,
                
            ]);

        return redirect('/users/' .$request->user_id );

    }

    public function upload(Request $request, User $user)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/images';
             $filename = time() . '.' . $image->getClientOriginalExtension();

            // image intervention to resize image 
            $img = Image::make($image->getRealPath());
            $img->resize(100,100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path. '/' .$filename);

                User::where('id', $user->id)
                ->update(array('image' => $filename));

             return redirect('/users/' . $user->id);
        }
    }

    
}

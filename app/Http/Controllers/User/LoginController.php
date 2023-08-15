<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Services\User\CommonService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Session;


class LoginController extends Controller
{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    public function indexLogin(){
        try {
            $user_email = Session::get('email');
            if(!empty($user_email)){
                return redirect()->route('dashboard');
            }else{
                return view('User.Auth.login');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function login(Request $request){
        try {
            $user = $this->CommonService->getsingleData($request->email, 'users');
            if (isset($user)) {
                if (Hash::check($request->password, $user->password)) {
                    Session::put('userId', $user->id);
                    Session::put('email', $user->email);
                    toastr()->success('User logged in successfully!');
                    return redirect()->route('dashboard');
                } else {
                    toastr()->error('Incorrect email or password!');
                    return back();
                }
            } else {
                toastr()->warning('Please fill valid info!');
                return back();
            }
        } catch (\Throwable $th) {
            // throw $th;
        }
    }

    public function registration(){
        try {
            $user_email = Session::get('email');
            if(!empty($user_email)){
                return redirect()->route('dashboard');
            }else{
                // return redirect()->url('/user/registration');
                return view('User.Auth.registration ');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function storeUserInfo(UserRequest $request){
        try {
            $input =  $request->validated();
            $fileName='';
            if ($request->hasFile('profile_img')) {
                $file = $request->file('profile_img'); 
                $fileName = time() . $file->getClientOriginalName();
                $image = Image::make($file);
                $image->fit(400, 400);
                $filePath = 'profile_images/' . $fileName;
                Storage::disk('public')->put($filePath, $image->stream());
            }
            if($input['password'] == $input['confirm_password']){
                    $dataSave = [
                        'profile_img'           =>$fileName,
                        'name'                     => $input['name'],
                        'email'                     => $input['email'],
                        'mobile'                  => $input['mobile'],
                        'father_name'         => $input['father_name'],
                        'mother_name'       => $input['mother_name'],
                        'address'                 => $input['address'],
                        'city'                        => $input['city'],
                        'post_code'             => $input['post_code'],
                        'password'              => Hash::make( $input['password']),
                        'created_at'            => now(),
                        'updated_at'           => now(),
                    ];
                    $getData = $this->CommonService->saveData('users', $dataSave);

                    if($getData){
                        toastr()->success('User register successfully please login!');
                        return redirect('/user/login');
                    }else{
                        toastr()->error('Sorry, unable to register!');
                        return back();
                    }
            }else{
                toastr()->error('Password And Confirm Password Not Match. Please Try Again..!!');
                return back();
            }
        } catch (\Throwable $e) {
            \Log::info($e);
        }
    }

    public function logout(Request $request)
    {
        try {
            Session::flush();
            toastr()->success('User logged out successfully!');
            return redirect('/user/login');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

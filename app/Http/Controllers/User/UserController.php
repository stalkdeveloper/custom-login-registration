<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\User\UserService;
use App\Services\User\CommonService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;

class UserController extends Controller
{

    protected $UserService;
    protected $CommonService;

    public function __construct(UserService $UserService, CommonService $CommonService)
    {
        $this->UserService = $UserService;
        $this->CommonService = $CommonService;
    }

    public function allUser(){
        try {
            $userAll = $this->UserService->userAll();
            return view('User.Pages.all-user')->with(compact('userAll'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function createUser(Request $request){
        try {
            return view('User.Pages.user-create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function storeUser(UserRequest $request){
        try {
            // \Log::info($request);
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
                        toastr()->success('Successfully, User created!');
                        return redirect('/user/all-user');
                    }else{
                        toastr()->error('Sorry, unable to create!');
                        return back();
                    }
            }else{
                toastr()->error('Password And Confirm Password Not Match. Please Try Again..!!');
                return back();
            }
        } catch(\Exception $e){
            // \Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());
        }
    }

    public function editUser($id){
        try {
            $userDetails = $this->UserService->userDataInfo($id);
            return view('User.Pages.user-edit')->with(compact('userDetails'));
            // return $userDetails;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateUser(Request $request){
        try {
            // \Log::info($request);
            $validator = Validator::make($request->all(),[
                'profile_img'           => 'image|mimes:jpeg,png,jpg',
                'name'                     => 'required|string|max:255',
                'email'                     => 'required|email|unique:users,email,'.$request->id,
                'mobile'                  => 'required|numeric|unique:users,mobile,'.$request->id,
                'father_name'         => 'required|string|max:255',
                'mother_name'       => 'required|string|max:255',
                'address'                 => 'required|string|max:255',
                'city'                        => 'required|string|max:255',
                'post_code'             => 'required|numeric|min:6|unique:users,post_code,'.$request->id,
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $userDetails = $this->UserService->userDataUpdate($request);

            if($userDetails){
                toastr()->success('Successfully, Updated user info!');
                return redirect('/user/all-user');
            }else{
                toastr()->error('Sorry, Unable to update this user!');
                return back();
            }
        } catch(\Exception $e){
        }
    }

    public function changePassword(){
        try {
            return view('User.Pages.user-password');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updatePassword(Request $request){
        try {
            $user_id = Session::get('userId');
            $user = User::where('id', $user_id)->first();
            $validator = Validator::make($request->all(),[
                'old_password'       => 'required',
                'password'              => 'required|string|min:8|max:12',
                'confirm_password'=> 'required|string|min:8|max:12',
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if (Hash::check($request->old_password, $user->password)) {
                if($request->old_password == $request->confirm_password){
                    toastr()->error('New password must be different from old password..!!');
                    return back();
                }else{
                    // --- New Password and confirm Passowrd Check ---
                    if ($request->new_password == $request->password_confirmation) {
                        $userData = User::where('id', $user_id)->update([
                            'password' => Hash::make($request->confirm_password)
                        ]);
                        toastr()->success('Successfully, Your Password Updated..!!');
                        return back();
                    } else {
                        toastr()->error('Password And Confirm Password Not Match. Please Try Again..!!');
                        return back();
                    }
                }
            } else {
                toastr()->error('Old Password Incorrect.!!');
                return back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteUser(Request $request){
        try {
            $userDetails = $this->UserService->userDataDelete($request);
            if($userDetails){
                toastr()->success('Successfully, This User Deleted!');
                return back();
            }else{
                toastr()->error('Sorry, Unable to delete this user!');
                return back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

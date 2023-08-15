<?php

namespace App\Services\User;

use App\Services\Service;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserService extends Service
{
    public function userAll(){
        try {
            $user = User::orderBy('id', 'desc')->paginate(10);
            return $user;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function userDataInfo($id){
        try {
            $user = User::where('id', $id)->first();
            return $user;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function userDataUpdate($request){
        try {
            $user = User::where('id', $request->id)->first();

            $fileName='';

            if( $request->hasFile('profile_img') && \File::exists(public_path('storage/profile_images/'.$user->profile_img))){
                \File::delete(public_path('storage/profile_images/'.$user->profile_img));
            }
            if ($request->hasFile('profile_img')) {
                $file = $request->file('profile_img'); 
                $fileName = time() . $file->getClientOriginalName();
                $image = Image::make($file);
                $image->fit(400, 400);
                $filePath = 'profile_images/' . $fileName;
                Storage::disk('public')->put($filePath, $image->stream());
                $data['profile_img'] = $fileName;
            }

            $data['name'] = $request['name'];
            $data['email'] = $request['email'];
            $data['mobile'] = $request['mobile'];
            $data['father_name'] = $request['father_name'];
            $data['mother_name'] = $request['mother_name'];
            $data['address'] = $request['address'];
            $data['city'] = $request['city'];
            $data['post_code'] = $request['post_code'];
            $data['created_at'] = now();
            $data['updated_at'] = now();

            $update = User::where('id', $request->id)->update($data);
            if($update){
                return true;
            }else{
                return false;
            }
        } catch(\Exception $e){

        }
    }


    public function userDataDelete($request){
        try {
            $delete = User::where('id', $request->id)->delete();
            if($delete){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ManagerRegNotification;
use Illuminate\Support\Facades\Notification;

class ManagerController extends Controller
{

    public function ManagerDashboard(){
        return view('manager.index');
    } // End Method

    public function ManagerLogin(){
        return view('manager.manager_login');
    } // End Method

    public function ManagerDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/manager/login');
    } // End Method

    public function ManagerProfile(){
        $id = Auth::user()->id;
        $managerData = User::find($id);
        return view('manager.manager_profile_view',compact('managerData'));

    } // End Method


    public function ManagerProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->io = $request->io;
        $data->rate = $request->rate;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/manager_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/manager_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Профиль менеджера успешно обновлен',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method

    public function ManagerChangePassword(){
        return view('manager.manager_change_password');
    } // End Method

    public function ManagerUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Старый пароль не соответствует!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", " Пароль успешно изменен");

    } // End Method

    public function BecomeManager(){
        return view('auth.become_manager');
    } // End Method


    public function ManagerRegister(Request $request) {

      //  $managerUser = User::where('role','admin')->get();

    /*  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);*/

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'io' => $request->input('io', []),
            'rate' => $request->input('rate', []),
            'message_type' => $request->input('message_type', []),
            'correspondent' => $request->input('correspondent', []),
            'password' => Hash::make($request->password),
            'role' => 'manager',
            'status' => 'inactive',
        ]);




        $notification = array(
            'message' => 'Менеджер успешно зарегистрировался',
            'alert-type' => 'success'
        );

       // Notification::send($managerUser, new ManagerRegNotification($request));
        return redirect()->route('manager.login')->with($notification);

    }// End Method



}

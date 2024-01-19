<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function AdminDashboard(){
        $data = Ticket::orderby('id', 'desc')->take(14)->get();
        $allData = Ticket::all()->count();
        $allDataRateRUB = Ticket::where('cur_mt', 'RUB')->get();
        $countAllDataRUB = $allDataRateRUB->count();

        $allDataRateEUR = Ticket::where('cur_mt', 'EUR')->get();
        $countAllDataEUR = $allDataRateEUR->count();

        $allDataRateUSD = Ticket::where('cur_mt', 'USD')->get();
        $countAllDataUSD = $allDataRateUSD->count();

        $allDataRateTJS = Ticket::where('cur_mt', 'TJS')->get();
        $countAllDataTJS = $allDataRateTJS->count();

        return view('admin.index', compact('data','allData', 'countAllDataRUB', 'countAllDataEUR', 'countAllDataUSD', 'countAllDataTJS'));

    } // END METHOD


    public function AdminLogin(){

        return view('admin.admin_login');

    }// END METHOD

    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));

    }// END METHOD

    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }// END METHOD


    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Профиль администратора успешно обновлен',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    } // End Method


    public function AdminUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Старый пароль не подходит!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Пароль успешно изменен");

    } // End Method



    public function InactiveManager(){
        $inActiveManager = User::where('status','inactive')->where('role','manager')->latest()->get();
        return view('backend.manager.inactive_manager',compact('inActiveManager'));

    }// End Method


    public function ActiveManager(){
        $ActiveManager = User::where('status','active')->where('role','manager')->latest()->get();
        return view('backend.manager.active_manager',compact('ActiveManager'));

    }// End Method


    public function InactiveManagerDetails($id){

        $inactiveManagerDetails = User::findOrFail($id);
        return view('backend.manager.inactive_manager_details',compact('inactiveManagerDetails'));

    }// End Method


    public function ActiveManagerApprove(Request $request){

        $manager_id = $request->id;
        $user = User::findOrFail($manager_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Менеджер успешно активен',
            'alert-type' => 'success'
        );

        //$manager_user = User::where('role','manager')->get();
        //Notification::send($manager_user, new ManagerApproveNotification($request));
        return redirect()->route('active.manager')->with($notification);

    }// End Method


    public function ActiveManagerDetails($id){

        $activeManagerDetails = User::findOrFail($id);
        return view('backend.manager.active_manager_details',compact('activeManagerDetails'));

    }// End Method


    public function InActiveManagerApprove(Request $request){

        $manager_id = $request->id;
        $user = User::findOrFail($manager_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Менеджер неактивен',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.manager')->with($notification);

    }// End Method


    ///////////// Admin All Method //////////////


    public function AllAdmin(){
        $alladminuser = User::where('role','admin')->latest()->get();
        return view('backend.admin.all_admin',compact('alladminuser'));
    }// End Method


    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.admin.add_admin',compact('roles'));
    }// End Method



    public function AdminUserStore(Request $request){

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Новый пользователь-администратор успешно добавлен',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }// End Method




    public function EditAdminRole($id){

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin',compact('user','roles'));
    }// End Method


    public function AdminUserUpdate(Request $request,$id){


        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Новый пользователь-администратор успешно обновлен',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    }// End Method


    public function DeleteAdminRole($id){

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Пользователь-администратор успешно удален',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method





}

<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\Gender;
use App\View\Components;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller {

    public function show() 
    {
        if(Auth::check() === true) {
            return view('welcome', [
                'name' => 'Janrex Pensader'
            ]);
        } else {
            return redirect('/login');
        }
    }

    public function getUsers() 
    {
        // var_dump(Auth::check());exit;
        if(Auth::check() === true) {
            $users = DB::table('user_tbl')
            ->join('gender_lu_tbl', 'user_tbl.gender', '=', 'gender_lu_tbl.gender_ID')
            ->select('user_tbl.*', 'gender_lu_tbl.gender AS gender_text')
            ->get();
        
            $genders = Gender::all();

            $male = DB::table('user_tbl')
            ->where('gender', '=', '1')
            ->get()
            ->count();

            $female = DB::table('user_tbl')
            ->where('gender', '=', '2')
            ->get()
            ->count();

            $salary = DB::table('user_tbl')
            ->sum('monthly_salary');    
            
            

            return view('users', [
                'page_title' => 'Sugartech Exercise',
                'table_name' => 'Users Table',
                'users' => $users,
                'genders' => $genders,
                'male' => $male,
                'female' => $female,
                'salary' => $salary
            ]);
        } else {
            return redirect('/login');
        }
        
        
    }

    public function getUserByID(int $id) 
    {
        $user_detail =  DB::table('user_tbl')
            ->join('gender_lu_tbl', 'user_tbl.gender', '=', 'gender_lu_tbl.gender_ID')
            ->select('user_tbl.*', 'gender_lu_tbl.gender AS gender_text')
            ->where('user_tbl.user_ID', '=', $id)
            ->get();

        return response()->json([ 
            'user_detail' => $user_detail 
        ], 200);
        
    }

    public function addUser(Request $request)
        {
            $user = new UserModel();

            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->monthly_salary = $request->salary;
            $user->email = $request->firstname . $request->lastname . "@mailinator.com";
            $user->password = Hash::make("test");
            $user->save();

            return redirect('/users');
        
    }

    public function editUser(Request $request)
    {

        $user = new UserModel();
        $user = UserModel::find($request->user_id);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->monthly_salary = $request->salary;
        $user->email = $request->firstname . $request->lastname . "@mailinator.com";
        $user->password = Hash::make("test");
        $user->save();

        return redirect('/users');
        
    }

    public function deleteUser(Request $request)
    {

        $user = new UserModel();
        $user = UserModel::find($request->delete_user_id)->delete();
       

        return redirect('/users');
        
    }
}

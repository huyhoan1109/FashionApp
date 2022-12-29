<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Carbon;
class ResetPasswordController extends Controller
{
    public function getPassword($token)
    {
        DB::table('password_reset')->where('created_at', '<', Carbon::now()->subSeconds(60))->delete();
        $validator = DB::table('password_reset')->where('token', $token)->first();
        if ($validator){
            return view('auth.passwords.reset', ['token' => $token]);
        } else {
            return abort(404, 'Page not found');
        }
    }
    
    public function updatePassword(Request $request)
    {
        $update = DB::table('password_reset')->where([
            'token' => $request->token
        ])->first();
        if(!$update)
        {
            Toastr::error('Invalid token! :)','Error');
            return back();
        }
        else{
            User::where('email', $update->email)->update([
                'password' => Hash::make($request->password)
            ]);
            DB::table('password_reset')->where([
                'token'=> $request->token
            ])->delete();
            Toastr::success('Your password has been changed! :)','Success');
            return redirect('/login');
        }
    }
}
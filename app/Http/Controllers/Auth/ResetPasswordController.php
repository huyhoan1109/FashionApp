<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class ResetPasswordController extends Controller
{
    public $timeout = 60;
    public function getPassword($token)
    {
        DB::table('password_reset')
        ->where('created_at', '<', Carbon::now()
        ->subSeconds($this->timeout))->delete();
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
            return back();
        }
        else{
            toast('Change password successfully', 'success', 'top-right');
            User::where('email', $update->email)->update([
                'password' => Hash::make($request->password)
            ]);
            DB::table('password_reset')->where([
                'token'=> $request->token
            ])->delete();
            return redirect('/login');
        }
    }
}
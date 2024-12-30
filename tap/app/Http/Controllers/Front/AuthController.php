<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UserContract;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\PlansWithPrice;
use App\Models\UserSubscription;
use Illuminate\Support\Str;
use PharIo\Manifest\Url;

class AuthController extends BaseController
{
    use AuthenticatesUsers;
    protected $userRepository;
    // protected $redirectTo = '/';

    public function __construct(UserContract $userRepository)
    {
        $this->middleware('guest:web')->except('logout');
        $this->userRepository = $userRepository;
        $this->back_url = '';
    }

    public function login(Request $request) {
        $back_url = url()->previous();
        return view('front.auth.login',compact('back_url'));
    }

    public function loginCheck(Request $request) {
        // dd($request->back_url);
        
        $request->validate([
            // 'email' => 'required|email|exists:users,email',
            'email'   => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // return $this->responseRedirect('front.dashboard.index','Login Successful','success',false,false);
			// return redirect()->to($request->back_url)->with('success', 'Login Successful');
            return redirect('/user/dashboard');
        } else {
            //return redirect()->back()->with(['message' => 'Wrong password!']);
			return redirect()->back()->with('failure', 'Wrong Password');
        }
    }

    public function register(Request $request) {
        return view('front.auth.register');
    }

    public function create(Request $request) {
        $request->validate([
            'type' => 'required|integer|min:1|in:1,2,3,4',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|integer|digits:10',
            'password' => 'required|min:6|max:100',
            'plan_with_price_id' => 'nullable|exists:plans_with_price,id'
        ],[
            'mobile.integer' => 'Mobile number must be numeric.'    
        ]);

        // dd($request->all());

        $user = new User;
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->type = $request['type'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->mobile = $request['mobile'];
        $user->plan_with_price_id = isset($request['plan_with_price_id'])?$request['plan_with_price_id']:NULL;

        $plan_id = NULL;
        $msg = "Account created successfully! ";
        if(isset($request['plan_with_price_id'])){
            $checkPlans = PlansWithPrice::with('currencyDet')->findOrFail($request['plan_with_price_id']);
            $duration = $checkPlans->duration;
            $plan_id = $checkPlans->plan_id;
            $user->subscription_id = $plan_id;
            $plan_name = $checkPlans->planDet->name;
            $msg = "Your account created with ".$plan_name." plan successfully";
        }

        // generate slug
        $full_name = $request['first_name'].' '.$request['last_name'];
        $slug = Str::slug($full_name, '-');
        $slugExistCount = User::where('slug', $slug)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        $user->slug = $slug;
        $user->save();

        /* Save User Subscription */

        if(isset($request['plan_with_price_id'])){
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime("+".$duration." days"));
            UserSubscription::insert([
                'user_id' => $user->id,
                'plan_with_price_id' => $request['plan_with_price_id'],
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }
        

        if ($user) {
            Auth::guard('web')->loginUsingId($user->id);
            return redirect('/user/dashboard')->with('success', $msg);
            // return redirect()->route('front.price.index')->with('success', 'Account created successfully! ');
        } else {
            return redirect()->route('front.user.register')->withInput($request->all())->with('failure', 'Something happened');
        }
    }

    public function forget_password_email(Request $request) {
        
        return view('front.auth.forget-password-email');
    }

    public function check_user_forget_password(Request $request) {
        $email = !empty($request->email)?$request->email:'';

        if(!empty($email)){
            $checkUser = User::where('email', $email)->first();
            

            if(!empty($checkUser)){
                $name = $checkUser->first_name;
                return redirect()->route('front.user.change_password_form', ['email'=>$email, 'name' => $name]);
            } else {
                return redirect()->back()->with('failure', 'No such user found with this email');
            }

            
        } else {
            return redirect()->back()->with('failure', 'No such user found with this email');
        }
    }

    public function change_password_form(Request $request)  {
        return view('front.auth.change-password-form');
    }

    public function save_password(Request $request){
        $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        $params = $request->except('_token');

        if($params['new_password'] != $params['confirm_password']){
            return redirect()->back()->with('failure', 'Both password must be same');
        } else {
            User::where('email', $params['email'])->update([
                'password' => bcrypt($params['new_password'])
            ]);

            return redirect()->route('front.user.login')->with('success', 'Password changed successfully. Please login with new password');
        }

    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('user/login')->with('success', 'Logout successfull');
        // return redirect()->route('front.index')->with('success', 'Logout successfull');
    }
}

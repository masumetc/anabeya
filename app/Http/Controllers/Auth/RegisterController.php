<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
                
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => ['required', 'numeric', 'min:10'],
            'user_address' => ['required', 'string'],
            'user_country' => ['required'],
            'user_city' => ['required', 'string'],
            'user_zip' => ['required', 'integer'],
            'customer_image' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
                
    protected function create(array $data)
    {
			$image_name = $_FILES['customer_image']['name'];
            $temp = explode(".", $image_name);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imagepath="public/images/customer_image/".$newfilename;
            move_uploaded_file($_FILES["customer_image"]["tmp_name"],$imagepath);
			
            return User::create([
                'customer_image' => $newfilename,
                'name' => $data['name'],
                'role' => 'customer',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'mobile' => $data['mobile'],
                'user_address' => $data['user_address'],
                'role' => 'customer',
                'user_country' => $data['user_country'],
                'user_city' => $data['user_city'],
                'user_zip' => $data['user_zip'],
        ]);       
                
        
    }

    // public function showRegistrationForm()
    // {
    //     //return redirect('login');
    // }
}

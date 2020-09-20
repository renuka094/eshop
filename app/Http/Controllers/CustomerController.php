<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller {
    public function showRegisterForm() {
        return view('front.customers.register');
    }
    public function showLoginForm() {
        return view('front.customers.login');
    }
    public function doLogin(Request $request) {
        $data = $request->all();
        // create our user data for the authentication
        $userdata = array('email' => $data['email'], 'password' => $data['password']);
        // attempt to do the login
        if (Auth::attempt($userdata)) {
            return redirect('/');
        } else {
            // validation not successful, send back to form
            return Redirect::to('login');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
    public function createCustomer(Request $request) {
        $data = $request->all();
        $user = Customers::create(['name' => $data['name'], 'email' => $data['email'], 'password' => bcrypt($data['password']), ]);
        auth()->login($user);
        return redirect()->to('/');
    }
}

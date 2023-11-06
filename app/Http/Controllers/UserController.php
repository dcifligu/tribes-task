<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


//All User Functions
class UserController extends Controller
{
    //Show Login Form
    public function showform(){
        return view('login');
    }

    //Show Registration Form
    public function showRegistration(){
        return view('register');
    }

    //Show Dashboard of User (Using ID)
        public function showUserDashboard(){
        if (Auth::check()) {
            $user = Auth::user();
            $tags = Tag::all();
            return view('user-dashboard', compact('user'));
        }
        else {

        }
    }

    //Logout from user Dashboard
    public function logout(Request $request)
    {
    Auth::logout(); // Log out the authenticated user
    $request->session()->invalidate(); // Invalidate the user's session
    $request->session()->regenerateToken(); // Regenerate the CSRF token
    return redirect()->route('showLogin')->with('message', 'You have been logged out.'); // Redirect to the login page
    }

    //View Task Details
    public function viewTask($id, $taskID)
    {
        $task = Task::find($taskID);
        return view('view-task', compact('task'));
    }

    //Show tasks that are owned by user
    public function tasks()
    {
        $tasks = Task::with('tags')->get();
        return $this->hasMany(Task::class, 'owner_id');
    }

    //Show Dashboard of Admin (Using ID)
    public function showAdminDashboard(){
        $user = Auth::guard('user')->user();
        return view('admin-dashboard', compact('user'));
    }

    //Register form function
    public function register(Request $request){
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);
        $user = User::create($validatedData);
        return redirect()->route('user.dashboard', ['id' => $user->id])->with('message', 'You are now logged in!');
    }

    //LoginForm
    public function authenticate(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        //Check user type
        if ($user->user_type === 'normal') {
            return redirect()->route('user.dashboard', ['id' => $user->id])->with('message', 'You are now logged in!'); //Admin login
        } else {
          return redirect()->route('showLogin')->with('message', 'These are admin credentials. Please use admin/login route'); //User Login
        }
    }
    return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }

}

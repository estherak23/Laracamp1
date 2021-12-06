<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
      // menampilkan viewnya
      public function login()
      {
          return view('auth.user.login');
      }

      public function google()
      {
        return Socialite::driver('google')->redirect();
      }

      public function handleProviderCallback() 
      //ambil data yg udah diisi
      {
          $callback = Socialite::driver('google')->stateless()->user();
           
          $data = [
              'name' => $callback->getName(),
              'email' => $callback->getEmail(),
              'avatar' => $callback->getAvatar(),
  
              //untuk signout
              'email_verified_at' => date('Y-m-d H:i:s', time())
          ];
  
  
          //integrasi ke database
          //first orcrete kalo ada email yg sama gak akan bikin baru tapi kalo belo dibikin baru
          $user = User::firstOrCreate(['email' => $data['email']], $data);
          
  
          //cek dulu emailnya ada atau engga
        //   $user = User::whereEmail($data['email'])->first();
         
        //   if (!$user)
        //   {
        //       //kalo gak ada berarti register
        //       $user = User::create($data);
        //       //setelah masuk database kita kirim ke email user yg dikirim after register terus parameternya data user
        //       Mail::to($user->email)->send(new AfterRegister($user));
        //   }
          Auth::login($user, true);
          return redirect(route('welcome'));
       }
}

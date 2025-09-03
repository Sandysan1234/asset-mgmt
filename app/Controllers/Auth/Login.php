<?php
// namespace App\Controllers\Auth;
// use Myth\Auth\Controllers\AuthController;
// class Login extends AuthController
// {
//   public function login()
//   {
//     helper('auth');
//     if (\auth()->loggedIn()) {
//       return redirect()->to('/dashboard');
//     }
//     if ($this->request->getMethod() === 'post') {
//       $rules = [
//         'login'    => 'required',
//         'password' => 'required',
//       ];
//       if ($this->validate($rules)) {
//         $login = $this->request->getPost('login');
//         $password = $this->request->getPost('password');
//         if (\auth()->attempt(['email' => $login, 'password' => $password])) {
//           $this->destroyOtherSessions(\auth()->id());
//           session()->setFlashdata('success', 'Selamat datang! Anda berhasil login.');
//           return redirect()->to('/dashboard');
//         }
//         return redirect()->back()->with('error', 'Email atau password salah.');
//       }
//     }
//     $data = [
//       'config' => config('Auth'),
//       'validation' => $this->validator,
//     ];
//     return view('Auth/login', $data);
//   }
//   private function destroyOtherSessions(int $userId)
//   {
//     $db = db_connect();
//     $sessionTable = 'ci4_sessions';
//     try {
//       $db->table($sessionTable)
//         ->where('user_id', $userId)
//         ->where("id !=", session_id())
//         ->delete();
//     } catch (\Exception $e) {
//       log_message('error', 'Gagal hapus sesi: ' . $e->getMessage());
//     }
//   }
// }

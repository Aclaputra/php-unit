<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Services\UserService;

class UserController extends Controller
{
  private UserService $userService;

  /**
   * @param UserService $userService
   */
  public function __construct(UserService $userService) {
      $this->userService = $userService;
  }

  public function login(): Response {
      return response()
          ->view("user.login", [
              "title" => "login"
          ]);
  }

  public function doLogin(Request $request) {
      $user = $request->input('user');
      $password = $request->input('password');

      //validate input
      if(empty($user) || empty($password)) {
          return response()->view("user.login", [
              "title" => "login",
              "error" => "User or password is required"
          ]);
      }

      if($this->userService->login($user, $password)) {
          $request->session()->put("user", $user);
          return redirect("/");
      }        

      return response()->view("user.login", [
          "title" => "login",
          "error" => "User or password is wrong"
      ]);
  }

  public function doLogout() {

  }
}

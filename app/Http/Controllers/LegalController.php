<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
  public function service()
  {
      return view('legal.service');
  }

  public function users()
  {
      return view('legal.use');
  }

  public function cookies()
  {
      return view('legal.cookie');
  }

  public function privacy()
  {
      return view('legal.privacy');
  }

  public function community()
  {
      return view('legal.community');
  }

  public function ip()
  {
      return view('legal.ip');
  }


}

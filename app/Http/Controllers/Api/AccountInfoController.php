<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccountInfo;

class AccountInfoController extends Controller
{
    public function filter(Request $request)
    {
      $results = AccountInfo::filter($request);

      return $results->get();
    }
}

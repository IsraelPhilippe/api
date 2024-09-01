<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Soccer extends Controller
{
    public function home()
    {
        $function = function () {
          return $this->_home();
        };

        return ($function);
    }


    private function _home()
    {
        return ['message' => 'Hello, API!'];
    }
}

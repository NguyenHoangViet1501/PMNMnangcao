<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function showForm()
    {
        return view('age');
    }

    public function saveAge(Request $request)
    {
        $request->validate([
        'age' => 'required|numeric'
    ]);

    session(['age' => $request->age]);

    return redirect('/age/secret');
    }
    public function secret()
    {
        return 'Content for users aged 18 and above.';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PharIo\Manifest\InvalidUrlException;

class UrlController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->ensureUrlIsValid($request);
        dd($request);
        // return Inertia::render('', [
        //  // 'users' => User::all(),
        // ]);
    }
    private function ensureUrlIsValid($url): void {
        if (\filter_var($url, \FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrlException;
        }
    }
}

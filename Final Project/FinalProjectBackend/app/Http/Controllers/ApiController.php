<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test()
    {
        return response()->json([
            "message" => "Hello World!",
        ]);
    }

    // This method will download a file from the server
    public function download(Request $request)
    {
        $file = $request->file;
        $path = storage_path("app/public/" . $file);
        return response()->download($path);
    }
}

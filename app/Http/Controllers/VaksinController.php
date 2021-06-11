<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function buatVaksin(Request $request)
    {
        $vaksin = new Vaksin();
        $vaksin->name = $request->name;
        $vaksin->description = $request->description;
        // $vaksin->userId = $request->user()->id;
        $vaksin->userId = 1;
        $vaksin->save();

        return redirect()->back()->with(['message' => 'Sukses']);
    }
}

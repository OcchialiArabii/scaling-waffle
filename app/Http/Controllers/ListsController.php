<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllLists;

class ListsController extends Controller
{
    public function ShowLists()
    {
        $lists = AllLists::all();
        return view('wordLists', ['lists' => $lists]);
    }

    public function AddList(Request $request)
    {
        return redirect()->route('addWord')->with('new-list', $request['name']);
    }
}

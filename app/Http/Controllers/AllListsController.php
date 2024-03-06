<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AllLists;

class AllListsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $model = new AllLists([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'user_id' => 1,
            'private' => 0
        ]);
        $model->save();

        $tableName ='list_' . AllLists::where('name', $validatedData['name'])->value('id');

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('eng')->unique();
            $table->string('pl');
        });

        return redirect()->route('wordLists');
    }
}

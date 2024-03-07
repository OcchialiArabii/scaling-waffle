<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AllLists;

class AllListsController extends Controller
{
    private $lists;

    // Przypisuje tablice wszytkich rekordów z tabeli '__lists' zmiennej $lists
    public function __construct()
    {
        $this->lists = AllLists::all();
    }

    // Zwraca widok 'wordLists' z tablicą wszytkich rekordów z tabeli '__lists'
    public function showLists()
    {
        return view('lists.showLists', ['lists' => $this->lists]);
    }

    // Pobiera dane z formularza 'addList', waliduje, dodaje rekord do tabeli '__lists'
    // Tworzy nową tabele i przekierowywuje do 'wordLists'
    public function createList(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $checkTableName = AllLists::where('name', $validatedData['name'])->value('id');

        if ($checkTableName === NULL) {
            $model = new AllLists([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'user_id' => 1,
                'private' => 0
            ]);
            $model->save();

            $tableName = 'list_' . AllLists::where('name', $validatedData['name'])->value('id');

            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->string('eng')->unique();
                $table->string('pl');
            });

            $status = 'List created correctly';
        } else {
            $status = 'Error adding list - list name already taken';
        }

        return redirect()->route('lists.showLists');
    }
}

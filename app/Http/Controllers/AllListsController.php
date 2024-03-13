<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\AllLists;

class AllListsController extends Controller
{
    private function arrayChange($arr)
    {
        $newArr = [];
        foreach ($arr as $row) {
            $newArr[] = json_decode(json_encode($row), true);
        }
        return $newArr;
    }

    // Zwraca widok 'wordLists' z tablicą wszytkich rekordów z tabeli '__lists'
    public function showLists()
    {
        return view('lists.showLists', ['lists' => AllLists::all()]);
    }

    // Pobiera dane z formularza 'addList', waliduje, dodaje rekord do tabeli '__lists'
    // Tworzy nową tabele i przekierowywuje do 'wordLists'
    public function createList(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'private' => 'required|string',
            'lang1' => 'required|string',
            'lang2' => 'required|string'
        ]);

        if (AllLists::where('name', $validatedData['name'])->value('id') === NULL) {
            $model = new AllLists([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'user_id' => 1,
                'private' => $validatedData['private'],
                'lang1' => $validatedData['lang1'],
                'lang2' => $validatedData['lang2']
            ]);
            $model->save();

            $tableName = 'list_' . AllLists::where('name', $validatedData['name'])->value('id');

            Schema::create($tableName, function (Blueprint $table) {
                $table->id();
                $table->string('lang1')->unique();
                $table->string('lang2')->unique();
            });

            $statusCreate = 'List created correctly';
        } else {
            $statusCreate = 'Error adding list - list name already taken';
        }

        return redirect()->route('lists.showLists', ['statusCreate' => $statusCreate]);
    }

    public function listsOptions($action)
    {
        $id = $_GET['id'];
        $listDetails = AllLists::find($id);
        switch ($action) {
            case 'draw-word':
                return view('lists.drawWord', ['id' => $id]);
            case 'add-word':
                return view('lists.addWord', ['id' => $id]);
            case 'edit-list':
                $listContent = $this->arrayChange(DB::table('list_' . $id)->orderBy('lang1')->get()->toArray());
                return view('lists.editList', ['id' => $id, 'listDetails' => $listDetails, 'listContent' => $listContent]);
        }
    }
}

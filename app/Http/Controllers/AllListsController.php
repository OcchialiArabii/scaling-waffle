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
        $lists = AllLists::all();
        $dataToSend=[];
        
        foreach($lists as $list){
            if(($list['user_id']==session('id'))||($list['private']==0))
            {
                array_push($dataToSend,$list);
            }
        }
        return view('lists.showLists', ['lists' => $dataToSend]);
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
                'user_id' => session()->get('id'),
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
            $statusCreate = 'Error adding list - invalid list name';
        }

        return redirect()->route('lists.showLists', ['statusCreate' => $statusCreate]);
    }

    public function listsOptions($action)
    {
        $id = $_POST['id'];
        $listDetails = AllLists::find($id);
        switch ($action) {
            case 'draw-word':
                $random=DB::table('list_'.$id)->inRandomOrder()->first();
                return view('lists.drawWord', ['word1' => $random->lang1,'word2'=>$random->lang2,'id'=>$id,'lists'=>AllLists::all(), 'listDetails'=>$listDetails]);
            case 'add-word':
                return view('lists.addWord', ['id' => $id, 'listDetails' => $listDetails]);
            case 'edit-list':
                $listContent = $this->arrayChange(DB::table('list_' . $id)->orderBy('lang1')->get()->toArray());
                return view('lists.editList', ['id' => $id, 'listDetails' => $listDetails, 'listContent' => $listContent]);
            case 'remove-list':
                $delete = DB::delete('delete from __lists where id = '.$id);
                $drop = DB::statement('drop table list_'.$id);
                if($delete&&$drop)
                {
                    return redirect()->route('lists.showLists',['message'=>'List has been removed sucessfuly']);   
                }
                return redirect()->route('lists.showLists',['message'=>'List remove error']);     
            case 'flip':
                return view('lists.drawWord', ['word1' => $_POST['word1'],'word2'=>$_POST['word2'],'id'=>$id,'lists'=>AllLists::all(),'listDetails'=>$listDetails,'flip'=>$_POST['flip']]);
            case 'edit-word':
                $row=$this->arrayChange(DB::table('list_'.$id)->where('id',$_POST['edit'])->get()->toArray());
                return view('lists.editWord',['list'=>$listDetails,'row'=>$row[0],'id'=>$id]);
            case 'remove-word':
                $delete = DB::delete('delete from list_'.$id.' where id = '.$_POST['row_id']);
                if($delete)
                {
                    $message='Word has been removed sucessfuly';
                }else{
                    $message="Word removing error";
                }
                $listContent = $this->arrayChange(DB::table('list_' . $id)->orderBy('lang1')->get()->toArray());
                return view('lists.editList', ['id' => $id, 'listDetails' => $listDetails, 'listContent' => $listContent, 'message'=>$message]);
                
        }
    }

    public function addWord()
    {
        $id = $_GET['id'];
        $listDetails = AllLists::find($id);
        $lang1 = $_GET['lang1'];
        $lang2 = $_GET['lang2'];
        $listContent = DB::table('list_' . $id)->where('lang1', $lang1)->orWhere('lang2', $lang2)->first();
        if (!$listContent) {
            $insert = DB::table('list_' . $id)->insert(['lang1' => $lang1, 'lang2' => $lang2]);
            if ($insert) {
                $status = 'Word <b>' . $lang1 . '</b> added correctly';
            } else {
                $status = 'Word <b>' . $lang1 . '</b> addition error';
            }
        } else {
            $status = 'Word <b>' . $lang1 . '</b> is already on the list';
        }
        return view('lists.addWord', ['id' => $id, 'listDetails' => $listDetails, 'status' => $status]);
    }

    public function editList()
    {
        $id=$_POST['id'];
        $listDetails = AllLists::find($id);
        $update = $listDetails->update(['name'=>"{$_POST['name']}",'description'=>"{$_POST['description']}",'private'=>"{$_POST['private']}"]);
        if($update)
        {
            $message="The List has been updated successfully";
        }
        else
        {
            $message="List updating error";
        }
        $listContent = $this->arrayChange(DB::table('list_' . $id)->orderBy('lang1')->get()->toArray());
        return view('lists.editList', ['id' => $id, 'listDetails' => $listDetails, 'listContent' => $listContent, 'message'=>$message]);

    }

    public function editWord()
    {
        $id=$_POST['id'];
        $listDetails = AllLists::find($id);
        $wordN1 = $_POST['wordN1'];
        $wordN2 = $_POST['wordN2'];
        $edit=DB::table('list_'.$id)->where('id',$_POST['edit'])->update(['lang1'=>"$wordN1",'lang2'=>"$wordN2"]);
        if ($edit) {
            $status = 'Word has been updated correctly';
        } else {
            $status = 'Word updating error';
        }
        $row=$this->arrayChange(DB::table('list_'.$id)->where('id',$_POST['edit'])->get()->toArray());
        return view('lists.editWord',['list'=>$listDetails,'id'=>$id,'row'=>$row[0],'status'=>$status]);   
    }
}

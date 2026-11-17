<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function tasks() {

       $alltasks = $this->allTasks();

        // dd($alltasks);

    return view('tasks.alltasks', compact('alltasks'));
    }

    public function addTasks(){

        $taskPersonInfo = User::select('name','id')
        ->get();

        // dd($taskPersonInfo);

        return view('tasks.addtasks', compact('taskPersonInfo'));
    }

    public function deleteTasks($id){

        Task::where('id', $id)->delete();

        return back();
    }

    public function editTasks($id){

        $taskInfo = Task::where('tasks.id', $id)
        ->join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id','tasks.name as taskname','tasks.status','tasks.due_at','users.name as username')
        ->orderBy('tasks.id')
        ->first();


        return view('tasks.editalltasks', compact('taskInfo'));

    }

    public function storeTask(Request $request){
        //validar os dados no servidor
        $request->validate([
            'task' => 'required|max:50',
            'desc' => 'required|max:250',
            'id' => 'required|exists:users,id'
        ]);

        //depois de validados, inserir na bd
        Task::insert([
            'name' => $request->task,
            'description' => $request->desc,
            'user_id' => $request->id
        ]);

        return redirect()->route('tasks.all')->with('message','Tarefa adicionado com sucesso!');
    }



    private function allTasks(){

        $tasksDB = Task::join('users', 'tasks.user_id', '=', 'users.id')
        ->select('tasks.id','tasks.name as taskname','tasks.status','tasks.due_at','users.name as username')
        ->orderBy('tasks.id')
        ->get();


        return $tasksDB;
    }
}

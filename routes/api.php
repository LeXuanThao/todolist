<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|------------------------------------
| Todolist API Routes
|------------------------------------
|
| Store all routes for todolist
| Create, update, edit tasks
|
*/

Route::group([], function(){
    //Get all tasks;
    Route::get('/tasks', function(Request $request){
        $tasks = \App\Task::all();
        if ($tasks) {
            return ['success'=>true,'data'=>$tasks];
        } else {
            return ['success'=>false,'data'=>NULL];
        }
    });
    //Get a task detail;
    Route::get('/task', function(Request $request){
        try {
            $id = $request->input('id');
            $task = \App\Task::find($id);
            if ($task) {
                return ['success'=>true,'data'=>$task];
            } else {
                return ['success'=>false,'data'=>NULL];
            }
        } catch (Exception $e) {
            return ['success'=>false,'data'=>NULL];
        }
    });
    //Create a task;
    Route::post('/task', function(Request $request){
        DB::beginTransaction();
        try {
            $title = $request->title;
            $descr = $request->description;
            $deadline = $request->deadline;
            $status = 1;
            $assign_to = 1;
            $created_by = 1;
            $priority = 1;
            $task = new \App\Task;
            $task->name = $title;
            $task->description = $descr;
            $task->deadline = $deadline;
            $task->created_by = $created_by;
            $task->assign_to = $assign_to;
            $task->priority = $priority;
            $task->status = $status;
            if ($task->save()) {
                DB::commit();
                return ['success'=>true,'data'=>$task];
            } else {
                DB::rollback();
                return ['success'=>false,'data'=>NULL];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            DB::rollback();
            return ['success'=>false,'data'=>NULL];
        }
    });
    //Update task;
    Route::put('/task', function(Request $request) {
        DB::beginTransaction();
        try {
            $id = $request->id;
            $task = \App\Task::find($id);
            if ($request->has('title')) {
                $task->name = $request->title;
            }
            if ($request->has('description')) {
                $task->description = $request->description;
            }
            if ($request->has('deadline')) {
                $task->deadline = $request->deadline;
            }
            if ($request->has('status')) {
                $task->status = $request->status;
            }
            if ($request->has('assign_to')) {
                $task->assign_to = $request->assign_to;
            }
            if ($request->has('created_by')) {
                $task->created_by = $request->created_by;
            }
            if ($request->has('priority')) {
                $task->priority = $request->priority;
            }
            if ($task->save()) {
                DB::commit();
                return ['success'=>true,'data'=>$task];
            } else {
                DB::rollback();
                return ['success'=>false,'data'=>NULL];
            }
        } catch (Exception $e) {
            return ['success'=>false,'data'=>NULL];
            DB::rollback();
        }
    });
    //Delete task;
    Route::delete('/task', function (Request $request) {
        DB::beginTransaction();
        try {
            $id = $request->id;
            $task= \App\Task::find($id);
            if ($task->delete()) {
                DB::commit();
                return ['success'=>true,'data'=>NULL];
            } else {
                DB::rollback();
                return ['success'=>false,'data'=>NULL];
            }
        } catch (Exception $e) {
            DB::rollback();
            return ['succcess'=>false,'data'=>NULL];
        }
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

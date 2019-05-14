<?php

use App\Task;
use Illuminate\Http\Request;
use App\News;

Route::get('/', function() {
    return view('index');
})->name('home');

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', function () {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('tasks_index');

    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::delete('/{task}', function(Task $task) {
        $task->delete();
        return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::get('/{task}/edit', function (Task $task) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    })->name('tasks_edit');

    Route::put('/{task}', function (Request $request, Task $task ) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_edit', $task->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_update');
});

Route::group(['prefix' => 'news'], function() {
    Route::get('/', function () {
        $news = News::all();
        return view('news.index', [
            'news' => $news, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]); //в уроке это вид tasks
    })->name('news_index');

    Route::get('/create', function(News $item) {
        return view('news.create',[
            'item'=>$item,
        ]);
    })->name('news_create');

    Route::get('/show/{item}', function(News $item) {
        return view('news.read', [
            'item' => $item, //значение переменной tasks спроецируется в переменную tasks внутри view
        ]);
    })->name('news_show');

    Route::delete('/{item}', function(News $item) {
        $item->delete();
        return redirect(route('news_index'));
    })->name('news_destroy');

    Route::get('/{item}/edit', function (News $item) {
        return view('news.edit', [
            'item' => $item,
        ]);
    })->name('news_edit');

    Route::post('/', function(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'text' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect(route('news_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $item = new News();
        $item->name = $request->name;
        $item->text = $request->text;
        $item->save();
        return redirect(route('news_index'));
    })->name('news_store');
    
     Route::put('/{item}', function (Request $request, News $item ) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_edit', $item->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $item->name = $request->name;
        $item->text = $request->text;
        $item->save();
        return redirect(route('news_index'));
    })->name('news_update');

});

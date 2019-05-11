@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ url('/tasks') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить задачу
                </button>
            </div>
        </div>
    </form>
</div>
<h3>Задачи:</h3>
<p>
@if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
      </div>
      <div class="panel-body">
        <table class="table table-striped task-table" >
          <!-- Заголовок таблицы -->
          <thead>
            <th>Задача</th>
            <th>Действие</th>
          </thead>
          <!-- Тело таблицы -->
          <tbody>
            @foreach ($tasks as $task)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $task->name }}</div>
                </td>
                <td>
                    <form method="POST" action="{{url('tasks/'.$task->id)}}">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                    <button type="submit" class="btn btn-default bg-danger">
                    <i class="fa fa-trash"></i> Удалить
                </button>
                    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection

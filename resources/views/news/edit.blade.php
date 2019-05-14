

@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{route('news_update',$item->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('put')}}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Заголовок</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="item-name" class="form-control" value="{{$item->name}}">
            </div>
            <label for="item" class="col-sm-3 control-label">Текст</label>
            <div class="col-sm-6">
                <textarea  name="text" id="item-name" class="form-control">{{$item->text}}</textarea>
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-edit"></i> Изменить задачу
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
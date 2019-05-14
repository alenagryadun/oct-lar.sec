@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    <form action="{{route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="item" class="col-sm-3 control-label">Заголовок</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="item-name" class="form-control">
            </div>
            <label for="item" class="col-sm-3 control-label">Текст</label>
            <div class="col-sm-6">
                <textarea  name="text" id="item-name" class="form-control"  ></textarea>
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i>Сохранить
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

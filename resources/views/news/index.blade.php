@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    
        <!-- Кнопка добавления задачи -->
        <a href="{{route('news_create') }}"><div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Добавить новость
                </button>
            </div>
        </div>
</a>
    
</div>
<h3>Новости:</h3>
<p>
    @if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table" >
            <!-- Заголовок таблицы -->
            <thead>
            <th>Заголовок</th>
            <th rowspan="3"></th>
            <th>Действие</th>
            <th></th>
            </thead>
            <!-- Тело таблицы -->
            <tbody>
                @foreach ($news as $item)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div>{{ $item->name }}</div>
                    </td>
                    <td>
                        <a href="{{route('news_show',$item->id)}}"><button type="submit" class="btn btn-default bg-info">
                                <i class="fa fa-book"></i> Читать
                            </button></a>  
                    </td>
                    <td>
                        <form method="POST" action="{{route('news_destroy',$item->id)}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-default bg-danger">
                                <i class="fa fa-trash"></i> Удалить
                            </button>
                    </td>
                    <td>
                        </form>

                        <a href="{{route('news_edit',$item->id)}}"><button type="submit" class="btn btn-default bg-warning">
                                <i class="fa fa-pen"></i> Редактировать
                            </button>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection

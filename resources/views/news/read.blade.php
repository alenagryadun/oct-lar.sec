
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <h2>{{$item->name}}</h2>
    <p>{{$item->text}}</p>
    <a href="{{route('news_index')}}"><button type="submit" class="btn btn-default bg-success"><i class="fa fa-angle-left"></i> Назад</button></a>
    <button type="submit" class="btn btn-default bg-danger">
        <i class="fa fa-trash"></i> Удалить
    </button>
</form>

<a href="{{route('item_edit',$item->id)}}"><button type="submit" class="btn btn-default bg-warning">
        <i class="fa fa-pen"></i> Редактировать
    </button>
</a>
@extends('layouts.app')
@section('content')
</div>
@endsection

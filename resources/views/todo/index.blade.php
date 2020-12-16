@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2 class="text-muted py-3 float-left">やること一覧</h2>
            <h3> <script>
            //今日の日付データを変数に格納
            //変数は"today"とする
            var today=new Date(); 

            //年・月・日・曜日を取得
            var year = today.getFullYear();
            var month = today.getMonth()+1;
            var week = today.getDay();
            var day = today.getDate();

            var week_ja= new Array("日","月","火","水","木","金","土");

            //年・月・日・曜日を書き出す
            document.write( "　　　　　　　　　　　　　　　　　" + year+"年"+month+"月"+day+"日 "+week_ja[week]+"曜日");
             </script> </h3>


            <div class="float-right my-3">
                <a href="/todo/create/" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>新規作成</a>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th width="40%">タイトル</th>
                    <th width="20%">期限</th>
                    <th width="12%">状態</th>
                    <th width="11%"></th>
                    <th width="11%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($todo_list as $todo)
                    <tr>
                        <td>
                            <a href="/todo/{{ $todo->id }}">
                                {{ $todo->title }}
                            </a>
                        </td>
                        <td>{{ $todo->getDisplayDate() }}</td>

                        <td>{{$todo->getStatusText()}}</td>

                        <th>
                            <a href="/todo/{{ $todo->id }}/edit" class="btn btn-success"><i class="fas fa-edit mr-2"></i>編集</a>
                        </th>
                        <th>
                            <button class="btn btn-danger delete-btn" type="button" data-toggle="modal" data-target="#delete-modal" data-todo_title="{{ $todo->title }}" data-todo_id="{{ $todo->id }}">
                                <i class="fas fa-trash-alt mr-2"></i>削除
                            </button>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $todo_list->links() }}
        </div>
    </div>
@include('parts.modal.delete')
@endsection

@section('script')
    <script src="{{ asset('/js/todo/app.js') }}"></script>
@endsection
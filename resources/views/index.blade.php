<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravel TODO</title>
    <!-- cssをインポート -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    @include('layouts.header')
    @yield('content')
    <script src="{{ mix('js/app.js') }}"></script>


    <div class="container">
        <form action="{{ route('search')}}" method="GET" class="row">
            <div class="col-2 mt-3 mr-3">
                <label><i class="fab fa-waze"></i> タイトル
                    <input type="text" name="title">
                </label>
            </div>
            <div class="col-2 mt-3 mr-3">
                <label><i class="far fa-comment"></i> 期限
                    <input type="text" name="deadline">
                </label>
            </div>
            <div class="col-2 mt-3 mr-3">
                <label><i class="far fa-calendar-check"></i> 優先度
                    <select class="form-control" name="importance">
                        @php
                        $importanceMap = array(0 => '低', 1 => '中', 2 => '高');
                        @endphp
                        <option></option>

                        @for ($i=0; $i<=2; $i++) <option value="{{$i}}">{{$importanceMap[$i]}}</option>
                            @endfor
                    </select>
                </label>
            </div>
            <div class="col-2 mt-3 mr-3">
                <label><i class="fas fa-fire-alt"></i> ステータス
                    <select class="form-control" name="status">
                        @php
                            $statusMap = array(0 => '未着手', 1 => '着手中', 2 => '完了', 3 => '中止');
                        @endphp
                        <option></option>

                        @for ($i=0; $i<=3; $i++) <option value="{{$i}}">{{$statusMap[$i]}}</option>
                            @endfor
                        </select>
                </label>
            </div>
            <div class="col-3 mt-2 ml-3">
                <input class="btn btn-success mt-4" type="submit" value="検索">
            </div>
        </form>

        <table class="table table-bordered table-hover table-sm mt-5">
            <thead class="bg-info text-white">
                <tr>
                    <th class="text-center fix-w-10">ID</th>
                    <th class="text-center fix-w-30">タイトル</th>
                    <th class="text-center fix-w-70">内容</th>
                    <th class="text-center fix-w-50">期限</th>
                    <th class="text-center fix-w-50">優先度</th>
                    <th class="text-center fix-w-50">ステータス</th>
                    <th class="text-center fix-w-10">編集</th>
                    <th class="text-center fix-w-10">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td class="text-center">{{$task->id}}</td>
                    <td class="">{{$task->title}}</td>
                    <td class="">{{$task->content}}</td>
                    @php
                        $explodedDeadline = explode(' ', $task->deadline);
                        $formattedDeadline = $explodedDeadline[0];
                    @endphp
                    <td class="text-center">{{$formattedDeadline}}</td>
                    @php
                    $importanceMap = array(0 => '低', 1 => '中', 2 => '高');
                    @endphp

                    @php
                    $statusMap = array(0 => '未着手', 1 => '着手中', 2 => '完了', 3 => '中止');
                    @endphp

                            <td class="text-center">{{$importanceMap[$task->importance]}}</td>

                            <td class="text-center">{{$statusMap[$task->status]}}</td>

                    <td class="text-center"><a href="{{ route('edit_page', ['id' => $task->id])}}" class="btn btn-secondary" name="edit">編集</a></td>

                    <td class="text-center"><a href="{{ route('delete', ['id' => $task->id])}}" class=" btn btn-danger" name="delete">削除</a></td>

                </tr>
                @endforeach
                <!-- 2.モーダルの配置 -->
<div class="modal" id="modal-example" tabindex="-1">
    <div class="modal-dialog">

        <!-- 3.モーダルのコンテンツ -->
        <div class="modal-content">
            <!-- 4.モーダルのヘッダ -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- 5.モーダルのボディ -->
            <div class="modal-body">
                タスクを削除しますか？
            </div>
            <!-- 6.モーダルのフッタ -->
            <div class="modal-footer">
                <button type="button" class="text-center btn btn-default" data-dismiss="modal">キャンセル</button>
                <button type="submit" class="text-center btn btn-danger"  data-toggle="modal" data-target="#modal-example">削除</button>
            </div>
        </div>
    </div>
</div>
            </tbody>
        </table>
    </div>
</body>

</html>

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

        <div class="mt-3">
            <form action="{{ route('update')}}" method="POST" class="form-horizontal" autocomplete="off">
                {{ csrf_field() }}
                <label><i class="far fa-comment"></i> タイトル</label>
                <input type="hidden" name="id" value="{{$task->id}}">
                <input type="text" size="100" class="form-control" name="title" value="{{$task->title}}">

                <label><i class="mt-4 far fa-comment-dots"></i> 内容</label>
                <input type="text" size="100" class="form-control" name="content" value="{{$task->content}}">

                <label><i class="mt-4 far fa-calendar-check"></i> 期限</label>
                <input type="date" size="100" class="form-control" name="deadline"
                    value="{{explode(' ', $task->deadline)[0]}}">

                <label><i class="mt-4 fas fa-fire-alt"></i> 優先度</label>
                <select class="form-control" name="importance">
                    @php
                    $importanceMap = array(0 => '低', 1 => '中', 2 => '高');
                    @endphp

                    @for ($i=0; $i<=2; $i++)
                    @if ($i==$task->importance)

                        <option value="{{$i}}" selected>
                            {{$importanceMap[$i]}}
                        </option>
                        @else
                        <option value="{{$i}}">
                            {{$importanceMap[$i]}}
                        </option>
                        @endif
                        @endfor

                </select>
                <label><i class="mt-4 fas fa-fire-alt"></i> ステータス</label>
                <select class="form-control" name="status">
                    @php
                     $statusMap = array(0 => '未着手', 1 => '着手中', 2 => '完了', 3 => '中止');
                    @endphp

                    @for ($i=0; $i<=3; $i++)
                    @if ($i==$task->status)

                    <option value="{{$i}}" selected>
                        {{$statusMap[$i]}}
                    </option>
                    @else
                    <option value="{{$i}}">
                        {{$statusMap[$i]}}
                    </option>
                    @endif
                    @endfor
                </select>
                <a href="{{ route('index')}}" class="btn btn-danger mt-4" name="cancel">キャンセル</a>
                <!-- ここaタグじゃない　input submitでやる
          ifで追加と変更をわける　aタグはGET送信になる-->
                <input type="submit" name="update" value="更新" class="btn btn-success mt-4"
                    onclick="{{ route('update', ['id' => $task->id])}}">

            </form>
        </div>
    </div>
</body>

</html>

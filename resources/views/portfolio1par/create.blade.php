@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{ date('m',  strtotime($exp->start)) }}
                    <form method="POST" action="">
                        @csrf
                        学籍番号
                        <br>
                        <br>
                        <br>
                        氏名
                        <br>
                        <input type="radio" name="name" value="{{ $participant->name }}">{{ $participant->name }}</input>
                        <br>
                        <br>
                        性別
                        <br>
                        <br>
                        <br>
                        年齢
                        <br>
                        <br>
                        メールアドレス
                        <br>
                        <input type="radio" name="email" value="{{ $participant->email }}">{{ $participant->email }}</input>
                        <br>
                        <br>



                        参加可能日をお選びください
                        <div class="calender">
                            <form class="prev-next-form"></form>
                            <table class="table">


                                <?php $start = date('m',  strtotime($exp->start)); ?>
                                <?php $end = 7 ?>
                                <?php while ($start <= $end): ?>
                                    <tr>
                                        <th colspan="7">
                                            <div class="text-center">
                                                {{ date('Y',  strtotime($exp->start)) }}年{{ $start }}月
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="sun" style="color: red">
                                            <div class="text-center">日</div>
                                        </th>
                                        <th class="mon">
                                            <div class="text-center">月</div>
                                        </th>
                                        <th class="tue">
                                            <div class="text-center">火</div>
                                        </th>
                                        <th class="wed">
                                            <div class="text-center">水</div>
                                        </th>
                                        <th class="thu">
                                            <div class="text-center">木</div>
                                        </th>
                                        <th class="fri">
                                            <div class="text-center">金</div>
                                        </th>
                                        <th class="sat" style="color: blue">
                                            <div class="text-center">土</div>
                                        </th>
                                    </tr>
                                    <?php $start = $start + 1; ?>
                                <?php endwhile; ?>






                            </table>
                        </div>





                        <input type="checkbox" name="caution" value="1">注意事項に同意する
                        <br>

                        <input class="btn btn-info" type="submit" value="登録する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
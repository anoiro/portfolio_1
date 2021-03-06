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

                    <form method="POST" action="{{ route('user.update', ['participantID'=>$participant->id]) }}">
                        @csrf
                        学籍番号
                        <br>
                        <label><input type="radio" name="studentNumber" value="{{ $participant->studentNumber }}" checked>{{ $participant->studentNumber }}</input>
                        <br>
                        <br>
                        氏名
                        <br>
                        <label><input type="radio" name="name" value="{{ $participant->name }}" checked>{{ $participant->name }}</input>
                        <br>
                        <br>
                        性別
                        <br>
                        <label><input type="radio" name="gender" value="{{ $participant->gender }}" checked>{{ $participant->gender }}</input>
                        <br>
                        <br>
                        年齢
                        <br>
                        <label><input type="radio" name="age" value="{{ $participant->age }}" checked>{{ $participant->age }}歳</input>
                        <br>
                        <br>
                        メールアドレス
                        <br>
                        <label><input type="radio" name="email" value="{{ $participant->email }}" checked>{{ $participant->email }}</input>
                        <br>
                        <br>
                        実験名
                        <br>
                        <label><input type="radio" name="expID" value="{{ $exp->id }}" checked>{{ $exp->expName }}</input></label>
                        <br>
                        <br>

                        参加可能日をお選びください
                        <div class="calender">
                            {{-- <form class="prev-next-form"></form> --}}
                            <table class="table">
                                <tr>
                                    <th colspan="7">
                                        <div class="text-center">
                                            {{ $date->year }}年{{ $date->month }}月
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

                                @foreach ($calendar as $week)
                                <tr>
                                    @foreach ($week as $day)
                                    <td>
                                        <div class="text-center">
                                            @if($day->weekDay() === 0)
                                            <span class="sun" style="color: red">{{ $day->day }}</span>
                                            @elseif($day->weekDay() === 6)
                                            <span class="sat" style="color:blue;">{{ $day->day }}</span>
                                            @else
                                            <span class="other">{{ $day->day }}</span>
                                            @endif
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+8 hours')->modify('+40 minutes') }}" @if(in_array($day->modify('+8 hours')->modify('+40 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>1コマ</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+10 hours')->modify('+20 minutes') }}" @if(in_array($day->modify('+10 hours')->modify('+20 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>2コマ</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+12 hours')->modify('+45 minutes') }}" @if(in_array($day->modify('+12 hours')->modify('+45 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>3コマ</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+14 hours')->modify('+25 minutes') }}" @if(in_array($day->modify('+14 hours')->modify('+25 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>4コマ</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+16 hours')->modify('+5 minutes') }}" @if(in_array($day->modify('+16 hours')->modify('+5 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>5コマ</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+18 hours') }}" @if(in_array($day->modify('+18 hours')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>18:00～19:00</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+18 hours')->modify('+30 minutes') }}" @if(in_array($day->modify('+18 hours')->modify('+30 minutes')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>18:30～19:30</label>
                                            <br>
                                            <label><input type="checkbox" name="candidate[]" value="{{ $day->modify('+19 hours') }}" @if(in_array($day->modify('+19 hours')->format('Y-m-d H:i:s'),$datetimes,true)) checked @endif @if($exp->weekend===1 and ($day->weekDay() === 0 or $day->weekDay() === 6)) disabled='disabled' @endif @if($day->month===$date->month-1 or $day->month===$date->month+1 or ($date->month===12 and $day->month===1) or ($date->month===1 and $day->month===12)) disabled='disabled' @endif @if($day<$startRes or $endRes<$day) disabled='disabled' @endif>19:00～20:00</label>
                                            <br>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <label><input type="checkbox" name="caution" value="1">注意事項に同意する</label>
                        <br>
                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>
                    <form method="POST" action="{{ route('user.destroy', ['participantID'=>$participant->id, 'exp'=>$exp]) }}" id="delete_{{ $participant->id }}">
                        @csrf
                        <a href="#" class="btn btn-danger" data-id="{{ $participant->id }}" onclick="deletePost(this);">全て削除する</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか?')){
            document.getElementById('delete_'+e.dataset.id).submit();
        }
    }
</script>

@endsection
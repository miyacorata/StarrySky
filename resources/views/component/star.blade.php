<?php
/**
 * @var $star App\Star
 */
?>
<a href="{{ url('/star/'.$star->name_r) }}" class="star-button" data-star="{{ $star->name_r }}">
    <div class="tachie" style="background-image: url('{{ asset('image/tachie/'.$star->name_r.'.png') }}')"></div>
    <div class="name" style="background: {{ $star->color }}">{{ $star->name }}</div>
    <div class="school-info">
        {{ $star->school }}<br>
        {{ $star->department.' '.$star->grade.($star->grade <= 3 ? '年' : '期生') }}
    </div>
    <div class="cast-info">{{ $star->cv }}</div>
</a>

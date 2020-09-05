<?php
/**
 * @var $star App\Star
 */
if($star->name_r_separate_secondary){
    $name = separateString($star->name, $star->name_separate, '・');
}else{
    $name = $star->name;
}
?>
<a href="{{ url('/star/'.$star->name_r) }}" class="star-button" data-star="{{ $star->name_r }}">
    <div class="tachie" style="background-image: url('{{ asset('image/tachie/'.$star->name_r.'.png') }}')"></div>
    <div class="name" style="background: {{ $star->color }}">{{ $name }}</div>
    <div class="school-info">
        {{ $star->school }}<br>
        {{ $star->department.' '.$star->grade.($star->grade <= 3 ? '年' : '期生') }}
    </div>
    <div class="cast-info">{{ $star->cv }}</div>
</a>

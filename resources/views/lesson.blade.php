@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row text-center mb-5">
        <h3 class="display-4 mb-10 px-xl-10 mb-0">{{ $data->name }}</h3>
        <hr class="mt-0 mb-0">
    </div>
    <div class="row justify-content-end">
        <div class="col-md-2">
            @php
                $isPass = App\Models\Exam::where(['lessonId' => $data->id, 'memberId' => Auth::user()->id, 'isPass' => true])->first() == null ? false : true;
            @endphp
            @if (!$isPass)
                <a href="{{ route('question', $data->id) }}" class="btn rounded-pill w-100 mb-5"
                    style="background-color: #f1dfd3">ทำแบบทดสอบ</a>
            @else
                <button class="btn btn-green rounded-pill w-100 mb-5"><i class="uil uil-check"></i> ผ่านแบบทดสอบแล้ว</button>
            @endif
        </div>
    </div>
    <div class="row">
        @if ($data->videoUrl != null and $data->videoUrl != '')
            <div class="col-12">
                <x-embed url="{{ $data->videoUrl }}" />
            </div>
        @endif
        <div class="col-12">
            {!! str_replace('<p>&nbsp;</p>', '', $data->description) !!}
        </div>
    </div>
@endsection

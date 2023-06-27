@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row text-center mb-5">
        <h3 class="display-4 mb-10 px-xl-10 mb-0">หมวดการเรียนรู้</h3>
        <hr class="mt-0 mb-0">
    </div>
    <div class="row">
        @foreach ($lessons as $value)
            @php
                $coverUrl = asset('img/no-image.png');
                $isPass = App\Models\Exam::where(['lessonId' => $value->id, 'memberId' => Auth::user()->id, 'isPass' => true])->first() == null ? false : true;
                
                if ($value->videoUrl != null) {
                    $videoId = str_replace('https://youtu.be/', '', $value->videoUrl);
                    $coverUrl = 'http://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';
                }
            @endphp
            <div class="col-md-4 mb-5">
                <a href="{{ route('lesson.show', $value->id) }}">
                    <figure class="rounded">
                        <img src="{{ $coverUrl }}" srcset="{{ $coverUrl }}" alt="">
                    </figure>
                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <div class="card image-wrapper bg-full bg-image text-white mt-n8 border-radius-lg-top"
                                style="background-color: #f1dfd3">
                                <div class="card-body p-3 text-black-50 text-center">
                                    <h1>{{ $value->name }}</h1>
                                    @if (!$isPass)
                                        <span class="badge bg-ash text-white rounded-pill text-lg">ไม่ผ่าน</span>
                                    @else
                                        <span class="badge bg-green text-white rounded-pill text-lg">ผ่านแล้ว</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

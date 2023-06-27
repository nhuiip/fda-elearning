@extends('layouts.app')
@section('title', $title)
@section('content')
    @if ($member->passed)
        @include('_finish', ['member' => $member])
    @else
        @if ($exam->isPass)
            @include('_passed', [
                'member' => $member,
                'exam' => $exam,
                'lesson' => $lesson,
                'maxScore' => $maxScore,
                'countRight' => $countRight,
            ])
        @else
            @include('_notpass', [
                'member' => $member,
                'exam' => $exam,
                'lesson' => $lesson,
                'maxScore' => $maxScore,
                'countRight' => $countRight,
            ])
        @endif
    @endif
@endsection

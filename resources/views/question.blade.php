@extends('layouts.app')
@section('title', $title)
@section('css')
    <style>
        h1 {
            text-align: center;
        }

        h2 {
            margin: 0;
        }

        #multi-step-form-container {
            margin-top: 1rem;
        }

        .text-center {
            text-align: center;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .pl-0 {
            padding-left: 0;
        }

        .button {
            padding: 0.7rem 1.5rem;
            border: 1px solid #f1dfd3;
            background-color: #f1dfd3;
            color: black;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn {
            border: 1px solid #f1dfd3;
            background-color: #f1dfd3;
        }

        .mt-3 {
            margin-top: 2rem;
        }

        .d-none {
            display: none;
        }

        .form-step {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 3rem;
        }

        .font-normal {
            font-weight: normal;
        }

        ul.form-stepper {
            counter-reset: section;
            margin-bottom: 3rem;
        }

        ul.form-stepper .form-stepper-circle {
            position: relative;
        }

        ul.form-stepper .form-stepper-circle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .form-stepper-horizontal {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        ul.form-stepper>li:not(:last-of-type) {
            margin-bottom: 0.625rem;
            -webkit-transition: margin-bottom 0.4s;
            -o-transition: margin-bottom 0.4s;
            transition: margin-bottom 0.4s;
        }

        .form-stepper-horizontal>li:not(:last-of-type) {
            margin-bottom: 0 !important;
        }

        .form-stepper-horizontal li {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .form-stepper-horizontal li:not(:last-child):after {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            height: 1px;
            content: "";
            top: 32%;
        }

        .form-stepper-horizontal li:after {
            background-color: #dee2e6;
        }

        .form-stepper-horizontal li.form-stepper-completed:after {
            background-color: #f1dfd3;
        }

        .form-stepper-horizontal li:last-child {
            flex: unset;
        }

        ul.form-stepper li a .form-stepper-circle {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-right: 0;
            line-height: 1.7rem;
            text-align: center;
            background: rgba(0, 0, 0, 0.38);
            border-radius: 50%;
        }

        .form-stepper .form-stepper-active .form-stepper-circle {
            background-color: #f1dfd3 !important;
            color: #fff;
        }

        .form-stepper .form-stepper-active .label {
            color: #f1dfd3 !important;
        }

        .form-stepper .form-stepper-active .form-stepper-circle:hover {
            background-color: #f1dfd3 !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-unfinished .form-stepper-circle {
            background-color: #f8f7ff;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle {
            background-color: #f1dfd3 !important;
            color: #fff;
        }

        .form-stepper .form-stepper-completed .label {
            color: #f1dfd3 !important;
        }

        .form-stepper .form-stepper-completed .form-stepper-circle:hover {
            background-color: #f1dfd3 !important;
            color: #fff !important;
        }

        .form-stepper .form-stepper-active span.text-muted {
            color: #fff !important;
        }

        .form-stepper .form-stepper-completed span.text-muted {
            color: #fff !important;
        }

        .form-stepper .label {
            font-size: 1rem;
            margin-top: 0.5rem;
        }

        .form-stepper a {
            cursor: default;
        }
    </style>
@endsection
@section('content')
    <div class="row text-center">
        <h3 class="display-4 mb-10 px-xl-10 mb-0">{{ $lesson->name }}</h3>
        <input type="hidden" id="lessonId" value="{{ route('question.submitCart', $lesson->id) }}">
        <input type="hidden" id="lessonIdSave" value="{{ route('question.saveCart', $lesson->id) }}">
        @php
            $cart = Cart::name('exams');
        @endphp
    </div>
    <div id="multi-step-form-container">
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            @php
                $indexStep = 1;
            @endphp
            @foreach ($data as $value)
                <li class="@if ($indexStep == 1) form-stepper-active @else form-stepper-unfinished @endif text-center form-stepper-list"
                    step="{{ $indexStep }}">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>{{ $value->sort }}</span>
                        </span>
                    </a>
                </li>
                @php
                    $indexStep++;
                @endphp
            @endforeach
        </ul>
        <div id="userAccountSetupForm">
            @php
                $indexStep = 1;
            @endphp
            @foreach ($data as $value)
                <section id="step-{{ $indexStep }}" class="form-step @if ($indexStep != 1) d-none @endif">
                    <h2 class="font-normal">{{ $value->name }}</h2>
                    <div class="mt-5">
                        @foreach ($value->choices as $item)
                            @php
                                $hasItem = count($cart->getItems(['id' => $item->questionId])) == 0 ? false : true;
                                $choiceId = null;
                                if ($hasItem) {
                                    $oldValue = $cart->getItems(['id' => $item->questionId]);
                                    $preKey = array_keys($oldValue);
                                    $key = $preKey[0];
                                    $val = $cart->getItem($key);
                                    $choiceId = $val->getExtraInfo('choiceId');
                                }
                            @endphp
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="radio" name="choiceId-in-{{ $value->id }}"
                                    id="choice-{{ $item->sort }}-in-{{ $value->id }}" value="{{ $item->id }}"
                                    @if ($hasItem && $choiceId == $item->id) checked @endif>
                                <label class="form-check-label"
                                    for="choice-{{ $item->sort }}-in-{{ $value->id }}">{{ $item->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <hr class="mt-5 mb-5">
                    @if ($indexStep != 1)
                        <button class="button btn-navigate-form-step" type="button"
                            onclick="navigateToFormStep({{ $indexStep - 1 }})">ย้อนกลับ</button>
                    @endif
                    @if ($indexStep != count($data))
                        <button class="button btn-navigate-form-step" type="button" step_number="{{ $indexStep + 1 }}"
                            onclick="setCart(this)" data-input-name="choiceId-in-{{ $value->id }}">ถัดไป</button>
                            <button class="button btn-navigate-form-step" type="button" onclick="saveCart(this)"
                            data-input-name="choiceId-in-{{ $value->id }}">บันทึก</button>
                    @else
                        <button class="button btn-navigate-form-step" type="button" onclick="submitCart(this)"
                            data-input-name="choiceId-in-{{ $value->id }}">ส่งข้อสอบ</button>
                    @endif
                </section>
                @php
                    $indexStep++;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script>
        function saveCart(e) {
            let input = $(e).attr('data-input-name');
            let value = $('input[name=' + input + ']:checked').val()
            $.ajax({
                url: '{!! route('question.setCart') !!}',
                type: 'POST',
                data: {
                    choiceId: value
                },
                dataType: 'JSON',
                success: function(data) {
                    let url = $('#lessonIdSave').val()
                    window.location.href = url;
                }
            });
        }

        function submitCart(e) {
            let input = $(e).attr('data-input-name');
            let value = $('input[name=' + input + ']:checked').val()
            $.ajax({
                url: '{!! route('question.setCart') !!}',
                type: 'POST',
                data: {
                    choiceId: value
                },
                dataType: 'JSON',
                success: function(data) {
                    let url = $('#lessonId').val()
                    window.location.href = url;
                }
            });
        }

        function setCart(e) {
            let step_number = $(e).attr('step_number');
            let input = $(e).attr('data-input-name');
            let value = $('input[name=' + input + ']:checked').val()
            $.ajax({
                url: '{!! route('question.setCart') !!}',
                type: 'POST',
                data: {
                    choiceId: value
                },
                dataType: 'JSON',
                success: function(data) {
                    navigateToFormStep(step_number)
                }
            });
        }

        function navigateToFormStep(stepNumber) {
            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                formStepElement.classList.add("d-none");
            });

            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                formStepHeader.classList.add("form-stepper-unfinished");
                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
            });

            document.querySelector("#step-" + stepNumber).classList.remove("d-none");

            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
            formStepCircle.classList.add("form-stepper-active");

            for (let index = 0; index < stepNumber; index++) {
                const formStepCircle = document.querySelector('li[step="' + index + '"]');

                if (formStepCircle) {
                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                    formStepCircle.classList.add("form-stepper-completed");
                }
            }
        }
    </script>
@endsection

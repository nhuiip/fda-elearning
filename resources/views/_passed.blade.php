<div class="row text-center mb-5">
    <h3 class="display-4 mb-3 px-xl-10 mb-0">ผ่านเกณฑ์: {{ $lesson->name }}</h3>
    <p>ต้องได้คะแนนอย่างน้อย {{ $lesson->passScore }} %</p>
    <hr class="mb-5">
    <h4 class="display-4 mb-3 px-xl-10 mb-0">{{ Auth::user()->name }}: {{ Auth::user()->company }}
        ({{ Auth::user()->position }})</h4>
    <p class="mb-0">จำนวนข้อสอบที่ทำถูกต้องทั้งหมด: <span class="text-success"
            style="font-size: 1.5rem"><strong>{{ $countRight }}</strong></span> ข้อ</p>
    <p class="mb-0">คะแนนที่ได้: <span class="text-success"
            style="font-size: 1.5rem"><strong>{{ $exam->score }}</strong></span> คะแนน</p>
    <p class="mb-5">คิดเป็น: <span class="text-success"
            style="font-size: 1.5rem"><strong>{{ ($exam->score * 100) / $maxScore }} % </strong></span></p>
    <hr class="mb-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('home') }}" class="btn w-100" style="background-color: #f1dfd3">กลับหน้าหลัก</a>
        </div>
    </div>
</div>

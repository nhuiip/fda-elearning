<div class="row text-center mb-5">
    <h3 class="display-4 mb-3 px-xl-10 mb-0">คุณได้ผ่านการอบรมออนไลน์</h3>
    <p>การพัฒนาหลักสูตรฝึกอบรมแก่ภาคีเครือข่ายของกองผลิตภัณฑ์สมุนไพร เพื่อยกระดับมาตรฐานด้านการตรวจประเมินสถานที่ผลิตผลิตภัณฑ์สมุนไพรอย่างมีระบบ</p>
    <hr class="mb-5">
    <h4 class="display-4 mb-3 px-xl-10 mb-0">{{ Auth::user()->name }}: {{ Auth::user()->company }}
        ({{ Auth::user()->position }})</h4>
    <p class="mb-5">กรุณาตรวจสอบข้อมูลส่วนตัวและข้อมูลบริษัท ก่อนดาวน์โหลดใบประกาศณียบัตร</p>
    <hr class="mb-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <a href="{{ route('home') }}" class="btn w-100" style="background-color: #f1dfd3">กลับหน้าหลัก</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('pdf') }}" class="btn w-100" style="background-color: #f1dfd3">ดาวน์โหลดใบรับรอง</a>
        </div>
    </div>
</div>

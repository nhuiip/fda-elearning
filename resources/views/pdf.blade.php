<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
            border: 5px solid #4e9572;
            border-radius: 30px;
            width: 100%;
            text-align: center;
            /* padding: 10px 0 10px 0; */
            margin: 0;
        }

        div {
            text-align: center;
        }

        .box {
            width: 100%;
            padding: 20px 0;
            line-height: 0;
        }

        /* span {
            border-bottom: 1px dotted black;
            text-align: center;
        } */
    </style>
</head>

<body>
    <br>
    <img src="https://upload.wikimedia.org/wikipedia/th/c/c5/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AD%E0%B8%B2%E0%B8%AB%E0%B8%B2%E0%B8%A3%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%A2%E0%B8%B2%E0%B9%84%E0%B8%97%E0%B8%A2.JPG"
        alt="" width="15%">
    <div class="box">
        <p style="font-size: 40px;font-weight: bold;">ประกาศนียบัตรรับรอง</p>
        <div style="line-height: 12px;">
            <h1>กองผลิตภัณฑ์สมุนไพร</h1>
            <h1>สำนักงานคณะกรรมการอาหารและยา</h1>
            <h2>ขอมอบเกียรติบัตรฉบับนี้</h2>
            <h2>เพื่อแสดงว่า</h2>
            <br>
            <br>
        </div>
        <div>
            <h1>{{ $data['name'] }}</h1>
            {{-- <hr style="width: 50%;border: 1px dotted black;"> --}}
        </div>
        <div style="line-height: 12px;">
            <h1>ผ่านการอบรมหลักสูตร</h1>
            <div style="line-height: 10px;">
                <br>
                <h2>หลักเกณฑ์ วิธีการ และเงื่อนไขขั้นพื้นฐานเกี่ยวกับการผลิตผลิตภัณฑ์สมุนไพร</h2>
                <h2>ตามพระราชบัญญัติผลิตภัณฑ์สมุนไพร พ.ศ. 2562</h2>
                <h3>ให้ไว้ ณ วันที่
                    <span>
                        &nbsp;&nbsp;
                        {{ $data['date'] }}
                        &nbsp;&nbsp;
                    </span>
                </h3>
            </div>
            <br>
            <br>
            <br>
        </div>
        <img src="https://aseangmpthaifda.com/img/S__5480582.jpg" alt="" width="15%">
        <hr style="width: 40%;border: 1px dotted black;">
        <div style="line-height: 10px;">
            <h2>นายฉัตรชัย พานิชศุภภรณ์</h2>
            <h2>ผู้อำนวยการกองผลิตภัณฑ์สมุนไพร</h2>
            <img src="https://aseangmpthaifda.com/img/snippet.png" alt=""
                width="30%">
        </div>
    </div>

</body>

</html>

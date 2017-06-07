<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        *{
            Font-Size:16px;
        }  
        @page {
           size: A4;
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
        p.small {
            line-height: 70%;
        }
    </style>
</head>
<body>
<p style="text-align: center;">ยื่นใบคำร้องขออนุญาตใช้น้ำประปา</p>
<p style="text-align: left;">เลขที่ 788</p>
<p style="text-align: left; padding-left: 30px;">ข้าพเจ้า {{$customer->title.' '.$customer->firstname.' '.$customer->lastname }} อยู่บ้านเลขที่ {{$customer->house_id}} ตำบล {{$customer->tambon}}</p>
<p style="text-align: left;">อำเภอ แม่สรวย จังหวัด เชียงราย มีอาชีพ ค้าขาย สถานที่ทำงาน x สถานที่ติดตั้งมาตร x ขอรับอนุญาตต่อท่อประปาจากองการประปา เทศบาลตำบลแม่สรวย ตามข้อความดังต่อไปนี้<br />ข้าพเจ้ามีความประสงค์จะขอติดตั้งท่อประปาและมาตรน้ำ เพื่อใช้อุปโภค บริโภค และข้าพเจ้ายินยอมเสียค่าธรรมเนียมที่ทางเทศบาลตำบลแม่สรวยเรียกร้องทุกประการและยินดีจ่ายค่าใช้จ่ายอุปกรณ์การติดตั้งทุกอย่าง ข้าพเจ้าจะปฏิบัติตามกฏ ข้อบังคับ ว่าด้วยการใช้น้ำประปาทุกประการเพื่อการใช้น้ำประปาโดยมี&nbsp;xxxx เป็นเจ้าของบ้านและภายในบ้านมีจำนวนคนทั้งสิ้น x คน</p>
<p style="text-align: left; padding-left: 30px;">จึงเรียนมาเพื่อโปรดอนุญาติให้ข้าพเจ้าได้ทำการต่อท่อประปาใช้ในบ้านด้วย</p>
<p style="padding-left: 30px; text-align: center;">ลงชื่อ .................................ผู้ขออนุญาติ</p>
<p style="padding-left: 30px; text-align: center;">( &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )</p>
<p style="padding-left: 30px; text-align: left;">ความเห็นของเจ้าหน้าที่<br />________________________________________________________________________________________________________________</p>
<p style="padding-left: 30px; text-align: center;">({{$sys[0]->system_register_prove1}}) &nbsp;&nbsp;<br />{{$sys[0]->system_register_prove2}}<br />{{$sys[0]->system_register_prove3}}</p>
<p style="padding-left: 30px; text-align: left;">ความเห็นของรองปลัดเทศบาล</p>
<p style="padding-left: 30px; text-align: left;">_________________________________________________________________________________________________________________</p><br>
<p style="padding-left: 30px; text-align: center;">({{$sys[0]->system_register_prove4}}) &nbsp;&nbsp;<br />{{$sys[0]->system_register_prove5}}<br />{{$sys[0]->system_register_prove6}}</p>
<p style="padding-left: 30px; text-align: left;">ความเห็นของนายกเทศมนตรีตำบลแม่สรวย</p>
<p style="padding-left: 30px; text-align: left;">_________________________________________________________________________________________________________________</p><br>
<p style="padding-left: 30px; text-align: center;">({{$sys[0]->system_register_prove7}}) &nbsp;&nbsp;<br />{{$sys[0]->system_register_prove8}}<br />{{$sys[0]->system_register_prove9}}</p>
</body>
</html>
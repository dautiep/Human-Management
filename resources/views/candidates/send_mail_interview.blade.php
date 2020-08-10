@foreach($candidate as $item)
    <p>Dear {{$item['ho_ten']}}!</p>
    <p>Cảm ơn em đã quan tâm và ứng tuyển tại Công Ty Cổ Phần Bellsystem24-HoaSao.</p>
    <p>Chúng tôi xin trân trọng mời em đến tham gia phỏng vấn tại công ty chúng tôi với nội dung như sau:</p>
    <p>- Vị trí tuyển dụng: {{$item['ten_chuc_danh']}}</p>
    <p>- Thời gian: {{$item['gio']}} ngày {{$item['ngay']}}</p>
    <p>- Địa điểm: {{$item['dia_diem']}}</p>
    <p>Hồ sơ cần có:</p>
    <p>- Đơn xin việc.</p>
    <p>- Sơ yếu lý lịch.</p>
    <p>- Chứng minh nhân dân và giấy khám sức khỏe (có thể bổ sung sau).</p>
    <p>- Các bằng cấp có liên quan.</p>
    <p>Rất mong bạn có thể sắp xếp thời gian tham gia. Trong trường hợp nếu em không thể thu xếp thời gian, xin vui lòng liên hệ lại chúng tôi theo địa chỉ trên để xác nhận lại.</p>
    <br>
    <p>--</p>
    <p>Trân trọng</p>
    @break
@endforeach




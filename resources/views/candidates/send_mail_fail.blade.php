@foreach($candidate as $item)
    <p>Dear {{$item['ho_ten']}}!</p>
    <p>Cảm ơn em đã tham gia cuộc phỏng vấn tại Công Ty Cổ Phần Bellsystem24-HoaSao.</p>
    <p>Chúng tôi đánh giá cao năng lực cũng như sự quan tâm của em tới công ty.</p>
    <p>Chúng tôi xin thông báo</p>
    <p>Em chưa đủ diều kiện để ứng tuyển vào vị trí {{$item['vi_tri']}} của công việc: {{$item['cong_viec']}}</p>
    <p>Tuy nhiên chúng tôi sẽ giữu lại hồ sơ của em để sau này nếu có cơ hội cho chững công việc sau.</p>
    <br>
    <p>--</p>
    <p>Trân trọng</p>
    @break
@endforeach
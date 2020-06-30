Hướng dẫn sử dụng
B1: Xây dựng CSDL
    Duan cha User, Job, Ungvien
    User cha Job
    Job cha Ungvien
    Chucdanh cha Ungvien
    Nguonjob cha Ungvien
    Tinh cha Huyen
    Huyen cha Xa
    Tinh, Huyen, Xa cha của Ungvien
    Trangthaiphongvan cha Ungvien
    Ketquaphongvan cha Ungvien

    => thứ tự các bảng như sau:
    User (id, username, email, password, ho_ten, so_dien_thoai, gioi_tinh, danh_so, avatar, id_duan)
    Duan (id, slug, quy_mo_tbinh,mota_duan, thoi_gian_bat_dau, thoi_gian_ket_thuc, ten_du_an, id_user)
    Job (id, ma_job, ten_job, cap_bac_vi_tri, li_do_tuyen, so_luong_tuyen, songay_tieuchuan_vitri, thoigian_den_onboard, thoi_gian_offer id_user)
    Chucdanh (id, ten_chuc_danh)
    Trangthaiphongvan (id, ten_trang_thai_phong_van)
    Ketquaphongvan (id, ten_ket_qua_phong_van)
    Tinh (id, ten_tinh)
    Huyen (id, ten_huyen, id_tinh)
    Xa (id, ten_xa, id_huyen, id_tinh)
    Nguonjob (id, ten_nguon)
    Ungvien (id, ho_ten, gioi_tinh, ngay_sinh, so_dien_thoai, email, sonha, phuong/xa, quan/huyen, tinh/TP,  id_job, id_chucdanh, id_nguonjob)
    Thongbao (id, type, notifible_type, notifible_id, data, read_at)

    1.1 Dự án:
    - 106x
        + 1068 : Dve, 
        + 1069-1
        + 1069-2
        + 1069-3
    - 198
    - Telesale
    - Vtv cab
    - Tp Bank
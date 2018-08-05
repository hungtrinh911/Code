<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=== Thông tin hệ thống (Không hiển thị/sửa đổi trên form) ===*/
        // Danh sách ngôn ngữ
        $option = new Option();
        $option->key = 'locale_list';
        $option->value = '[{"locale":"vi","name":"Tiếng Việt","flag":"/backend/assets/images/flag_vi.png"},{"locale":"en","name":"English","flag":"/backend/assets/images/flag_en.png"}]';
        $option->group = 'system';
        $option->description = 'Danh sách ngôn ngữ hỗ trợ';
        $option->save();

        // Ngôn ngữ mặc định
        $option = new Option();
        $option->key = 'locale_default';
        $option->value = 'vi';
        $option->group = 'system';
        $option->description = 'Mã ngôn ngữ mặc định';
        $option->save();

        /*=== Thông tin về SITE ===*/
        $option = new Option();
        $option->key = 'site_name';
        $option->value = 'LiveReal';
        $option->group = 'site';
        $option->description = 'Tên website/ứng dụng';
        $option->save();

        $option = new Option();
        $option->key = 'site_url';
        $option->value = 'http://127.0.0.1:8000';
        $option->group = 'site';
        $option->description = 'Domain website/ứng dụng';
        $option->save();

        $option = new Option();
        $option->key = 'site_icon';
        $option->value = '';
        $option->group = 'site';
        $option->description = 'Biểu tượng trên trình duyệt của website';
        $option->save();

        $option = new Option();
        $option->key = 'site_logos';
        $option->value = '';
        $option->group = 'site';
        $option->description = 'Danh sách ảnh logo của site. Dữ liệu lưu theo json';
        $option->save();

        $option = new Option();
        $option->key = 'site_keywords';
        $option->value = '';
        $option->group = 'site';
        $option->description = 'Danh sách từ khóa mặc định của site.';
        $option->save();

        $option = new Option();
        $option->key = 'site_description';
        $option->value = 'Công ty TNHH LIVE REAL là một trong những công ty hàng đầu trong lĩnh vực phân phối, phát triển bất động sản hàng đầu tại Tp.HCM';
        $option->group = 'site';
        $option->description = 'Mô tả ngắn gọn về site';
        $option->save();

        $option = new Option();
        $option->key = 'site_copyright';
        $option->value = '© Copyright LIVE REAL 2018';
        $option->group = 'site';
        $option->description = 'Dòng thông tin copyright';
        $option->save();

        $option = new Option();
        $option->key = 'site_addresses';
        $option->value = '["118 Vũ Tông Phan, Phường An Phú, Quận 2, Tp.HCM"]';
        $option->group = 'site';
        $option->description = 'Danh sách các địa chỉ.';
        $option->save();

        $option = new Option();
        $option->key = 'site_hotline';
        $option->value = '18006396';
        $option->group = 'site';
        $option->description = 'Số điện thoại hotline';
        $option->save();

        $option = new Option();
        $option->key = 'site_telephones';
        $option->value = '["(08)6281.3669", "0903 72 84 81"]';
        $option->group = 'site';
        $option->description = 'Danh sách số điện thoại bàn';
        $option->save();

        $option = new Option();
        $option->key = 'site_email';
        $option->value = 'info@livereal.vn';
        $option->group = 'site';
        $option->description = 'Địa chỉ email';
        $option->save();
    }
}

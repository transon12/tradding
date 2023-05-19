<?php
/*
	Template Name: Biểu đồ kỹ thuật

*/
?>
<?php get_header(); 




//URL of targeted site  
// $url = "https://sbboard.sbsi.vn/getlistallstock";  
// $ch = curl_init();  
// // set URL and other appropriate options  
// curl_setopt($ch, CURLOPT_URL, $url);  
// curl_setopt($ch, CURLOPT_HEADER, 0);  
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
// // grab URL and pass it to the browser  
// $output = curl_exec($ch);  
// // close curl resource, and free up system resources  
// curl_close($ch);  


//$varr = '[{"stock_code":"A32","name_vn":"Công ty Cổ phần 32","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần 32"},{"stock_code":"AAA","name_vn":"Công ty cổ phần Nhựa An Phát Xanh – An Phát Bioplastics","name_en":"null","post_to":"HOSE","name_short":"Công ty cổ phần Nhựa An Phát Xanh – An Phát Bioplastics"},{"stock_code":"AAM","name_vn":"Công ty Cổ phần Thuỷ sản Mekong","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Thuỷ sản Mekong"},{"stock_code":"AAS","name_vn":"CTCP CHUNG KHOAN SMARTINVEST","name_en":"null","post_to":"UPCOM","name_short":"CTCP CHUNG KHOAN SMARTINVEST"},{"stock_code":"AAT","name_vn":"CTCP TIEN SON THANH HOA","name_en":"null","post_to":"HOSE","name_short":"CTCP TIEN SON THANH HOA"},{"stock_code":"AAV","name_vn":"Công ty Cổ phần Việt Tiên Sơn Địa ốc","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Việt Tiên Sơn Địa ốc"},{"stock_code":"ABB","name_vn":"Ngân hàng Thương mại cổ phần An Bình","name_en":"null","post_to":"UPCOM","name_short":"Ngân hàng Thương mại cổ phần An Bình"},{"stock_code":"ABC","name_vn":"Công ty cổ phần truyền thông VMG","name_en":"null","post_to":"UPCOM","name_short":"Công ty cổ phần truyền thông VMG"},{"stock_code":"ABI","name_vn":"Công ty Cổ phần Bảo hiểm Ngân hàng Nông nghiệp","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Bảo hiểm Ngân hàng Nông nghiệp"},{"stock_code":"ABR","name_vn":"Công ty Cổ phần Đầu tư Nhãn Hiệu Việt","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Đầu tư Nhãn Hiệu Việt"},{"stock_code":"ABS","name_vn":"CTCP DV NN BINH THUAN","name_en":"null","post_to":"HOSE","name_short":"CTCP DV NN BINH THUAN"},{"stock_code":"ABT","name_vn":"Công ty Cổ phần Xuất nhập khẩu Thủy sản Bến Tre","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Xuất nhập khẩu Thủy sản Bến Tre"},{"stock_code":"AC4","name_vn":"Công ty Cổ phần ACC - 244","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần ACC - 244"},{"stock_code":"ACB","name_vn":"Ngân hàng Thương mại Cổ phần Á Châu","name_en":"null","post_to":"HOSE","name_short":"Ngân hàng Thương mại Cổ phần Á Châu"},{"stock_code":"ACC","name_vn":"Công ty Cổ phần Bê tông BECAMEX","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Bê tông BECAMEX"},{"stock_code":"ACE","name_vn":"Công ty Cổ phần Bê tông Ly tâm An Giang","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Bê tông Ly tâm An Giang"},{"stock_code":"ACG","name_vn":"Công ty Cổ phần Gỗ An Cường","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Gỗ An Cường"},{"stock_code":"ACL","name_vn":"CTCP Xuất nhập khẩu Thủy sản Cửu Long An Giang.","name_en":"null","post_to":"HOSE","name_short":"CTCP Xuất nhập khẩu Thủy sản Cửu Long An Giang."},{"stock_code":"ACM","name_vn":"Công ty Cổ phần Tập đoàn Khoáng sản Á Cường","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Tập đoàn Khoáng sản Á Cường"},{"stock_code":"ACS","name_vn":"Công ty Cổ phần Xây lắp Thương mại 2","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Xây lắp Thương mại 2"},{"stock_code":"ACV","name_vn":"Tổng Công ty Cảng hàng không Việt Nam - CTCP","name_en":"null","post_to":"UPCOM","name_short":"Tổng Công ty Cảng hàng không Việt Nam - CTCP"},{"stock_code":"ADC","name_vn":"Công ty Cổ phần Mỹ thuật và Truyền Thông","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Mỹ thuật và Truyền Thông"},{"stock_code":"ADG","name_vn":"Công ty cổ phần Clever Group","name_en":"null","post_to":"HOSE","name_short":"Công ty cổ phần Clever Group"},{"stock_code":"ADP","name_vn":"Công ty Cổ phần Sơn Á Đông","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Sơn Á Đông"},{"stock_code":"ADS","name_vn":"Công ty Cổ phần Damsan","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Damsan"},{"stock_code":"AFC","name_vn":"Công ty Cổ phần Nông Lâm Nghiệp Bình Dương","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Nông Lâm Nghiệp Bình Dương"},{"stock_code":"AFX","name_vn":"Công ty Cổ phần Xuất nhập khẩu Nông sản Thực phẩm An Giang","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Xuất nhập khẩu Nông sản Thực phẩm An Giang"},{"stock_code":"AG1","name_vn":"Công ty Cổ phần 28.1","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần 28.1"},{"stock_code":"AGE","name_vn":"null","name_en":"null","post_to":"UPCOM","name_short":"null"},{"stock_code":"AGF","name_vn":"Công ty Cổ phần Xuất nhập khẩu Thủy sản An Giang","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Xuất nhập khẩu Thủy sản An Giang"},{"stock_code":"AGG","name_vn":"CTCP DTPT BDS AN GIA","name_en":"null","post_to":"HOSE","name_short":"CTCP DTPT BDS AN GIA"},{"stock_code":"AGM","name_vn":"Công ty Cổ phần Xuất nhập khẩu An Giang","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Xuất nhập khẩu An Giang"},{"stock_code":"AGP","name_vn":"Công ty Cổ phần Dược phẩm Agimexpharm","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Dược phẩm Agimexpharm"},{"stock_code":"AGR","name_vn":"CTCP CK NHNN và phát triển nông thôn Việt Nam","name_en":"null","post_to":"HOSE","name_short":"CTCP CK NHNN và phát triển nông thôn Việt Nam"},{"stock_code":"AGX","name_vn":"Công ty Cổ phần Thực phẩm Nông sản Xuất khẩu Sài Gòn","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Thực phẩm Nông sản Xuất khẩu Sài Gòn"},{"stock_code":"AIC","name_vn":"Công ty cổ phần Bảo hiểm Hàng không","name_en":"null","post_to":"UPCOM","name_short":"Công ty cổ phần Bảo hiểm Hàng không"},{"stock_code":"ALT","name_vn":"Công ty Cổ phần Văn hóa Tân Bình","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Văn hóa Tân Bình"},{"stock_code":"ALV","name_vn":"Công ty cổ phần Đầu tư Phát triển Hạ tầng ALV","name_en":"null","post_to":"UPCOM","name_short":"Công ty cổ phần Đầu tư Phát triển Hạ tầng ALV"},{"stock_code":"AMC","name_vn":"Công ty Cổ phần Khoáng Sản Á Châu","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Khoáng Sản Á Châu"},{"stock_code":"AMD","name_vn":"Công ty Cổ phần Đầu tư và Khoáng sản AMD GROUP","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Đầu tư và Khoáng sản AMD GROUP"},{"stock_code":"AME","name_vn":"Công ty Cổ phần Alphanam E","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Alphanam E"},{"stock_code":"AMP","name_vn":"Công ty Cổ phần Armephaco","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Armephaco"},{"stock_code":"AMS","name_vn":"Công ty Cổ phần Cơ khí xây dựng AMECC","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Cơ khí xây dựng AMECC"},{"stock_code":"AMV","name_vn":"Công ty Cổ phần Sản xuất kinh doanh dược và trang thiết bị Y tế Việt Mỹ","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Sản xuất kinh doanh dược và trang thiết bị Y tế Việt Mỹ"},{"stock_code":"ANT","name_vn":"Công ty Cổ phần Rau quả Thực phẩm An Giang","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Rau quả Thực phẩm An Giang"},{"stock_code":"ANV","name_vn":"Công ty Cổ phần Nam Việt","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Nam Việt"},{"stock_code":"APC","name_vn":"Công ty Cổ phần Chiếu xạ An Phú","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Chiếu xạ An Phú"},{"stock_code":"APF","name_vn":"Công ty Cổ phần Nông sản Thực phẩm Quảng Ngãi","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Nông sản Thực phẩm Quảng Ngãi"},{"stock_code":"APG","name_vn":"Công ty Cổ phần Chứng khoán An Phát","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Chứng khoán An Phát"},{"stock_code":"APH","name_vn":"Công ty cổ phần tập đoàn An Phát Holdings","name_en":"null","post_to":"HOSE","name_short":"Công ty cổ phần tập đoàn An Phát Holdings"},{"stock_code":"API","name_vn":"Công ty Cổ phần Đầu tư Châu Á - Thái Bình Dương","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Đầu tư Châu Á - Thái Bình Dương"},{"stock_code":"APL","name_vn":"Công ty Cổ phần Cơ khí và Thiết bị áp lực - VVMI","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Cơ khí và Thiết bị áp lực - VVMI"},{"stock_code":"APP","name_vn":"Công ty Cổ phần Phát triển Phụ gia và Sản phẩm Dầu mỏ","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Phát triển Phụ gia và Sản phẩm Dầu mỏ"},{"stock_code":"APS","name_vn":"Công ty Cổ phần Chứng khoán Châu Á Thái Bình Dương","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Chứng khoán Châu Á Thái Bình Dương"},{"stock_code":"APT","name_vn":"CTCP Kinh doanh Thủy Hải Sản Sài Gòn","name_en":"null","post_to":"UPCOM","name_short":"CTCP Kinh doanh Thủy Hải Sản Sài Gòn"},{"stock_code":"AQN","name_vn":"Công ty Cổ phần 28 Quảng Ngãi","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần 28 Quảng Ngãi"},{"stock_code":"ARM","name_vn":"Công ty Cổ phần Xuất nhập khẩu Hàng không","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Xuất nhập khẩu Hàng không"},{"stock_code":"ART","name_vn":"Công ty Cổ phần Chứng khoán Artex","name_en":"null","post_to":"HNX","name_short":"Công ty Cổ phần Chứng khoán Artex"},{"stock_code":"ASA","name_vn":"Công ty Cổ phần Liên doanh SANA WMT","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Liên doanh SANA WMT"},{"stock_code":"ASD","name_vn":"Công ty Cổ phần Sông Đà Hà Nội","name_en":"null","post_to":"UPCOM","name_short":"Công ty Cổ phần Sông Đà Hà Nội"},{"stock_code":"ASG","name_vn":"CTCP TAP DOAN ASG","name_en":"null","post_to":"HOSE","name_short":"CTCP TAP DOAN ASG"},{"stock_code":"ASM","name_vn":"CTCP Tập Đoàn Sao Mai","name_en":"null","post_to":"HOSE","name_short":"CTCP Tập Đoàn Sao Mai"},{"stock_code":"ASP","name_vn":"Công ty Cổ phần Tập đoàn Dầu khí An Pha","name_en":"null","post_to":"HOSE","name_short":"Công ty Cổ phần Tập đoàn Dầu khí An Pha"}]';
// if(update_field('content_json_technical_chart', $varr, get_the_ID() )){
//     echo 'okkkkkkkk';
// }else{
//     echo 'failed';
// }


?>




<div  class="page-left-sidebar">
    <div class="row row-collapse row-full-width">
        <div class="col medium-4 small-12 large-3 snt-sidebar">
            <div class="col-inner">
            <?php echo do_shortcode('[ux_sidebar id="menu-sidebar" class="menu__sidebar"]');?>
            </div>
        </div>
        <div class="col medium-8 small-12 large-9 snt-main-content main-page-technical-chart">
            <div class="snt-auto">
                <div class="col-inner">
                    <div class="detail-tc-wrap">
                       
                        <div id="wrap-remove" class="page-inner hiden-while-load">

                            <?php 

                                if(isset($_GET['code_stock'])){ ?>
                                
                                    <div class="content-chart">
                                        <div class="technical-chart-wrap">
                                            <iframe src="https://info.sbsi.vn/chart/?symbol=<?php echo $_GET['code_stock']; ?>&language=vi&theme=light" frameborder="0" width="100%" height="100%"></iframe>
                                        </div>
                                    </div>

                            <?php 
                                }else{
                                    ?>
                                    <div class="content-chart">
                                        <div class="technical-chart-wrap">
                                            <iframe src="https://info.sbsi.vn/chart/?symbol=VNINDEX&language=vi&theme=light" frameborder="0" width="100%" height="100%"></iframe>
                                        </div>
                                    </div>
                            <?php 
                                   
                                }
                            
                            ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // jQuery(document).ready(function() {
    //     var table = jQuery('#list_stocks_tc').DataTable();
        
    //     jQuery('#list_stocks_tc_filter').prepend('<label>Sàn:<input id="column_3_search" type="text" placeholder="" class="test" /></label>');

    //     jQuery('#column_3_search').on( 'keyup', function () {
    //         table
    //             .columns( 1 )
    //             .search( this.value )
    //             .draw();
    //     }   );
    //     jQuery('#list_stocks_tc_wrapper tr').biggerlink();

    //     jQuery('#wrap-remove').removeClass('hiden-while-load');
    // });
</script>
<?php get_footer(); ?>
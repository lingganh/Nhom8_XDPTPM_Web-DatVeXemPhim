<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.Component.head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
</head>


<body>

    @include('backend.dashboard.Component.sidebar')
     <div id="page-wrapper" class="gray-bg">

    @include('backend.dashboard.Component.nav')

         <div class="content">
             @yield('content')
         </div>
    @include('backend.dashboard.Component.footer')
    @include('backend.dashboard.Component.script')

<script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });

        $("#datepicker2").datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
            duration: "slow"
        });
    });

</script>


   <script type="text/javascript">
       var chart = new Morris.Line({
           element: 'myfirstchart',
           parseTime: false, // Không dùng kiểu datetime
           hideHover: 'auto',
           data: [],
           xkey: 'Ngaydat',
           ykeys: ['Tongdon', 'Doanhso', 'Lai', 'Soluongdaban'],
           labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'],
           lineColors: ['#2196F3', '#FF9800', '#4CAF50', '#F44336'],
       });

       // Cập nhật biểu đồ khi có dữ liệu mới
       $('#btn-dashboard-filter').click(function() {
           var _token = $('input[name="_token"]').val();
           var from_date = $('#datepicker').val();
           var to_date = $('#datepicker2').val();

           $.ajax({
               url: "{{ url('/filter-by-date') }}",
               method: "POST",
               dataType: "JSON",
               data: { from_date: from_date, to_date: to_date, _token: _token },
               success: function(data) {
                   chart.setData(data); // Cập nhật dữ liệu biểu đồ
               },
               error: function(xhr) {
                   console.error(xhr.responseText); // In lỗi nếu có
               }
           });
       });

   </script>
     </div>
</body>
</html>

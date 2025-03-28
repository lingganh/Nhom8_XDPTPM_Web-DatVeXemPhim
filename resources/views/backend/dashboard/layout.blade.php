<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.Component.head')

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
       $(document).ready(function() {
            chart30daysorder();

       var chart = new Morris.Bar({
           element: 'myfirstchart',
           parseTime: false, // Không dùng kiểu datetime
           hideHover: 'auto',
           data: [],
           xkey: 'Ngaydat',
           ykeys: ['Tongdon', 'Doanhso', 'Lai', 'Soluongdaban'],
           labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'],
           lineColors: ['#2196F3', '#FF9800', '#4CAF50', '#F44336'],
       });
           function chart30daysorder() {
               var _token = $('input[name="_token"]').val();

               $.ajax({
                   url: "/days-order",
                   method: "POST",
                   dataType: "JSON",
                   data: { _token: _token },
                   success: function (data) {
                       chart.setData(data);
                   },
                   error: function (xhr, status, error) {
                       console.error("Lỗi khi lấy dữ liệu:", error);
                   }
               });
           }

           $('.dashboard-filter').change(function() {

               var dashboard_value = $(this).val();
               var _token = $('input[name="_token"]').val();

               $.ajax({
                   url: "/dashboard_filter",
                   method: "POST",
                   dataType: "JSON",
                   data: { dashboard_value: dashboard_value, _token: _token },
                   success: function(data) {
                       chart.setData(data);
                   },
                   error: function(xhr, status, error) {
                       console.error("Lỗi khi lấy dữ liệu:", error);
                   }
               });
           });

           $('#btn-dashboard-filter').click(function() {
               chart30daysorder();
              // alert('ok');
               var _token = $('input[name="_token"]').val();
               var from_date = $('#datepicker').val();
               var to_date = $('#datepicker2').val();

               $.ajax({
                   url: "/filter-by-date",
                   method: "POST",
                   dataType: "JSON",
                   data: { from_date: from_date, to_date: to_date, _token: _token },
                   success: function(data) {
                       chart.setData(data);
                   },
                   error: function(xhr, status, error) {
                       console.error("Lỗi khi lấy dữ liệu:", error);
                   }
               });
           });

       });

   </script>
     </div>
</body>
</html>

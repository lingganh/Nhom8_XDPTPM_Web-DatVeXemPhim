@extends('admin.dashboard.layout')

@section('content')

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <div class="container-fluid">
        <style type="text/css">
            p.title_thongke {
                text-align: center;
                font-size: 20px;
                font-weight:bold
            }
        </style>
        <div class="row">
            <p class="title_thongke">Thống kê đơn hàng doanh số</p>
            <form action="{{ route('admin.revenue.index') }}" method="get" style="display: flex; gap: 10px;">
                @csrf
                <div>
                    <p class="mb-0">
                       Từ ngày:
                    </p>
                    <input type="text" class="form-control"
                           name="start" id="datepicker" placeholder="Từ ngày" value="{{ $start }}">
                </div>
                <div>
                    <p class="mb-0">
                       Đến ngày:
                    </p>
                    <input type="text" class="form-control" name="end" id="datepicker2" placeholder="Đến ngày" value="{{ $end }}">
                </div>


                <div>
                    <p class="mb-0">
                        Lọc kết quả:
                    </p>
                    <button type="submit" id="btn-dashboard-filter" class="btn btn-primary btn-sm">Lọc kết quả</button>
                </div>


            </form>


        </div>
        <div style=" height:70vh; margin-bottom: 20px;">
            <h5 class="text-center"> Thống kê theo biểu đồ</h5>
            <canvas class="mb-5" id="myChart" ></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Lấy dữ liệu từ PHP và chuyển sang JavaScript
            const chartData = {
                dates: {!! json_encode($chart_date) !!},
                values: {!! json_encode($chart_value) !!},
                quantities: {!! json_encode($chart_quantity) !!}
            };

            // Tạo mảng màu sắc ngẫu nhiên cho mỗi cột
            const backgroundColors = chartData.dates.map(() => {
                const r = Math.floor(Math.random() * 255);
                const g = Math.floor(Math.random() * 255);
                const b = Math.floor(Math.random() * 255);
                return `rgba(${r}, ${g}, ${b}, 0.7)`;
            });

            const ctx = document.getElementById('myChart');
            if (ctx && chartData.dates.length > 0 && chartData.values.length > 0) {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: chartData.dates,
                        datasets: [{
                            label: 'Thống kê doanh thu theo ngày',
                            data: chartData.values,
                            backgroundColor: backgroundColors,
                            borderColor: backgroundColors.map(color => color.replace('0.7', '1')),
                            borderWidth: 1,
                            borderRadius: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value.toLocaleString('vi-VN') + ' VNĐ';
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const index = context.dataIndex;
                                        const revenue = context.parsed.y.toLocaleString('vi-VN') + ' VNĐ';
                                        const quantity = chartData.quantities[index] + ' vé';
                                        return [
                                            'Doanh thu: ' + revenue,

                                        ];
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                console.error('Không có dữ liệu để vẽ biểu đồ');
                document.getElementById('myChart').style.display = 'none';
            }

        </script>
@endsection

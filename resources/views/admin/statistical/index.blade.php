@extends('admin.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thống Kê Doanh Thu
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ number_format($totalRevenue, 0, ',', '.') }}đ</h3>
                        <p>Tổng Doanh Thu</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $successfulOrders }}</h3>
                        <p>Đơn Thành Công</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totalOrders }}</h3>
                        <p>Tổng Số Đơn Hàng</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $totalProductsSold }}</h3>
                        <p>Sản Phẩm Đã Bán</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-bar-chart"></i> Biểu đồ doanh thu</h3>
                        <div class="box-tools pull-right">
                            <div class="form-group form-inline" style="margin:0">
                                <input type="date" class="form-control input-sm" id="date-from">
                                <input type="date" class="form-control input-sm" id="date-to">
                                <button class="btn btn-sm btn-info" id="btn-filter">Lọc</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="revenue-chart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('my_javascript')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(function () {
            var chart = new Morris.Area({
                element: 'revenue-chart',
                data: [],
                xkey: 'period',
                ykeys: ['price', 'quantity'],
                labels: ['Doanh thu (đ)', 'Số lượng'],
                lineColors: ['#3c8dbc', '#00a65a'],
                hideHover: 'auto',
                parseTime: false
            });

            function loadChartData(from, to) {
                var url = '{{ route("admin.dashboard.showChar") }}';
                var data = {};
                if (from && to) {
                    url = '{{ route("admin.dashboard.filterChar") }}';
                    data = { from: from, to: to, _token: '{{ csrf_token() }}' };
                }

                $.ajax({
                    url: url,
                    type: from ? 'POST' : 'GET',
                    data: data,
                    success: function (res) {
                        if (res.code == 200) {
                            chart.setData(res.main);
                        }
                    }
                });
            }

            loadChartData();

            $('#btn-filter').click(function () {
                var from = $('#date-from').val();
                var to = $('#date-to').val();
                if (from && to) {
                    loadChartData(from, to);
                } else {
                    alert('Vui lòng chọn đầy đủ ngày bắt đầu và kết thúc');
                }
            });
        });
    </script>
@endsection
@extends('admin.layout.app')
@section('title')
    Photo Share : DashBoard
@endsection
@push('css')

@endpush

@section('content')

    @component('admin.layout.header')
        @slot('nav_title')
            Home Page
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Number Of Albums</p>
                    <h3 class="card-title">{{$albums}}
                        <small></small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">Number Of Users</p>
                    <h3 class="card-title">{{$users}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">photo</i>
                    </div>
                    <p class="card-category">Number Of photos</p>
                    <h3 class="card-title">{{$photos}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Tracked from Github
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">Followers</p>
                    <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card card-chart">
                <div class="card-header card-header-success">
                    <div class="ct-chart" id="dailySalesChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="99.04761614118303" x2="99.04761614118303" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="158.09523228236606" x2="158.09523228236606" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="217.1428484235491" x2="217.1428484235491" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="276.1904645647321" x2="276.1904645647321" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="335.2380807059152" x2="335.2380807059152" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="394.2856968470982" x2="394.2856968470982" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="453.33331298828125" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M40,91.2C99.048,79.2,99.048,79.2,99.048,79.2C158.095,103.2,158.095,103.2,158.095,103.2C217.143,79.2,217.143,79.2,217.143,79.2C276.19,64.8,276.19,64.8,276.19,64.8C335.238,76.8,335.238,76.8,335.238,76.8C394.286,28.8,394.286,28.8,394.286,28.8" class="ct-line"></path><line x1="40" y1="91.2" x2="40.01" y2="91.2" class="ct-point" ct:value="12" opacity="1"></line><line x1="99.04761614118303" y1="79.2" x2="99.05761614118303" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="158.09523228236606" y1="103.2" x2="158.10523228236605" y2="103.2" class="ct-point" ct:value="7" opacity="1"></line><line x1="217.1428484235491" y1="79.2" x2="217.1528484235491" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="276.1904645647321" y1="64.8" x2="276.2004645647321" y2="64.8" class="ct-point" ct:value="23" opacity="1"></line><line x1="335.2380807059152" y1="76.8" x2="335.2480807059152" y2="76.8" class="ct-point" ct:value="18" opacity="1"></line><line x1="394.2856968470982" y1="28.799999999999997" x2="394.2956968470982" y2="28.799999999999997" class="ct-point" ct:value="38" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="59.047616141183035" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="99.04761614118303" y="125" width="59.047616141183035" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="158.09523228236606" y="125" width="59.04761614118304" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">W</span></foreignObject><foreignObject style="overflow: visible;" x="217.1428484235491" y="125" width="59.04761614118303" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="276.1904645647321" y="125" width="59.047616141183056" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="335.2380807059152" y="125" width="59.04761614118303" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="394.2856968470982" y="125" width="59.04761614118303" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 59px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">10</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">20</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">30</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">40</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">50</span></foreignObject></g></svg></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Employees Stats</h4>
                    <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <tr><th>ID</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Country</th>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>$36,738</td>
                            <td>Niger</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Minerva Hooper</td>
                            <td>$23,789</td>
                            <td>Curaçao</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sage Rodriguez</td>
                            <td>$56,142</td>
                            <td>Netherlands</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Philip Chaney</td>
                            <td>$38,735</td>
                            <td>Korea, South</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush

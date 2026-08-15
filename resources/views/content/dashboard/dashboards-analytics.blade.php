@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Visitor Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
<!-- Metric Cards Row -->
<div class="row g-4 mb-6">
  <!-- Total Visitors -->
  <div class="col-sm-6 col-xl-3">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="avatar flex-shrink-0">
            <span class="avatar-initial rounded-3 bg-label-primary">
              <i class="bx bx-show fs-3 text-primary"></i>
            </span>
          </div>
          <span class="badge bg-label-primary rounded-pill px-2 py-1">Total Hits</span>
        </div>
        <p class="text-muted mb-1 small text-uppercase fw-medium">Total Visitors / Views</p>
        <h3 class="card-title mb-1 fw-bold text-dark">{{ number_format($totalVisitors) }}</h3>
        <small class="text-muted"><i class="bx bx-check-circle text-primary"></i> All-time tracked pageviews</small>
      </div>
    </div>
  </div>

  <!-- Today's Visitors -->
  <div class="col-sm-6 col-xl-3">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="avatar flex-shrink-0">
            <span class="avatar-initial rounded-3 bg-label-success">
              <i class="bx bx-user-check fs-3 text-success"></i>
            </span>
          </div>
          @if($todayGrowth >= 0)
            <span class="badge bg-label-success rounded-pill px-2 py-1">
              <i class="bx bx-up-arrow-alt"></i> +{{ $todayGrowth }}%
            </span>
          @else
            <span class="badge bg-label-danger rounded-pill px-2 py-1">
              <i class="bx bx-down-arrow-alt"></i> {{ $todayGrowth }}%
            </span>
          @endif
        </div>
        <p class="text-muted mb-1 small text-uppercase fw-medium">Today's Visitors</p>
        <h3 class="card-title mb-1 fw-bold text-dark">{{ number_format($todayVisitors) }}</h3>
        <small class="text-muted">vs {{ number_format($yesterdayVisitors) }} yesterday</small>
      </div>
    </div>
  </div>

  <!-- This Month's Visitors -->
  <div class="col-sm-6 col-xl-3">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="avatar flex-shrink-0">
            <span class="avatar-initial rounded-3 bg-label-info">
              <i class="bx bx-calendar fs-3 text-info"></i>
            </span>
          </div>
          <span class="badge bg-label-info rounded-pill px-2 py-1">{{ now()->format('F') }}</span>
        </div>
        <p class="text-muted mb-1 small text-uppercase fw-medium">This Month</p>
        <h3 class="card-title mb-1 fw-bold text-dark">{{ number_format($monthVisitors) }}</h3>
        <small class="text-muted"><i class="bx bx-calendar-event text-info"></i> {{ number_format($weekVisitors) }} this week</small>
      </div>
    </div>
  </div>

  <!-- Unique Visitors -->
  <div class="col-sm-6 col-xl-3">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div class="avatar flex-shrink-0">
            <span class="avatar-initial rounded-3 bg-label-warning">
              <i class="bx bx-fingerprint fs-3 text-warning"></i>
            </span>
          </div>
          <span class="badge bg-label-warning rounded-pill px-2 py-1">Unique</span>
        </div>
        <p class="text-muted mb-1 small text-uppercase fw-medium">Unique Visitors</p>
        <h3 class="card-title mb-1 fw-bold text-dark">{{ number_format($uniqueVisitors) }}</h3>
        <small class="text-muted"><i class="bx bx-shield-quarter text-warning"></i> Unique IP addresses</small>
      </div>
    </div>
  </div>
</div>

<!-- Main Analytics Row: Traffic Trend & Devices -->
<div class="row g-4 mb-6">
  <!-- Visitor Traffic Chart -->
  <div class="col-12 col-lg-8">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div>
          <h5 class="card-title mb-1 fw-semibold">Visitor Traffic Overview</h5>
          <p class="text-muted small mb-0">Daily pageviews and unique visitors over the last 14 days</p>
        </div>
        <div class="d-flex align-items-center gap-2">
          <span class="badge bg-label-primary"><span class="badge-dot bg-primary me-1"></span> Pageviews</span>
          <span class="badge bg-label-info"><span class="badge-dot bg-info me-1"></span> Unique Visitors</span>
        </div>
      </div>
      <div class="card-body px-2">
        <div id="visitorTrafficChart" style="min-height: 320px;"></div>
      </div>
    </div>
  </div>

  <!-- Device Breakdown -->
  <div class="col-12 col-lg-4">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-header pb-0">
        <h5 class="card-title mb-1 fw-semibold">Device Breakdown</h5>
        <p class="text-muted small mb-0">Visitors by device type</p>
      </div>
      <div class="card-body">
        <div id="deviceDonutChart" class="my-2" style="min-height: 200px;"></div>
        <div class="d-flex flex-column gap-3 pt-2">
          <!-- Desktop -->
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-desktop fs-5"></i></span>
              <div>
                <h6 class="mb-0 fw-medium">Desktop</h6>
                <small class="text-muted">{{ number_format($deviceStats['desktop']) }} visits</small>
              </div>
            </div>
            <span class="fw-bold text-dark">{{ $deviceStats['desktop_pct'] }}%</span>
          </div>
          <!-- Mobile -->
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-label-success p-2 rounded"><i class="bx bx-mobile-alt fs-5"></i></span>
              <div>
                <h6 class="mb-0 fw-medium">Mobile</h6>
                <small class="text-muted">{{ number_format($deviceStats['mobile']) }} visits</small>
              </div>
            </div>
            <span class="fw-bold text-dark">{{ $deviceStats['mobile_pct'] }}%</span>
          </div>
          <!-- Tablet -->
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-label-info p-2 rounded"><i class="bx bx-tab fs-5"></i></span>
              <div>
                <h6 class="mb-0 fw-medium">Tablet</h6>
                <small class="text-muted">{{ number_format($deviceStats['tablet']) }} visits</small>
              </div>
            </div>
            <span class="fw-bold text-dark">{{ $deviceStats['tablet_pct'] }}%</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bottom Section: Top Countries & Top Pages -->
<div class="row g-4 mb-6">
  <!-- Top Countries -->
  <div class="col-12 col-lg-6">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-header d-flex align-items-center justify-content-between pb-2">
        <div>
          <h5 class="card-title mb-1 fw-semibold">Top Countries</h5>
          <p class="text-muted small mb-0">Geographic visitor traffic distribution</p>
        </div>
        <span class="badge bg-label-primary">{{ count($topCountries) }} Countries</span>
      </div>
      <div class="card-body pt-2">
        @forelse($topCountries as $country)
          <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
            <div class="d-flex align-items-center gap-3">
              <span class="fs-4" title="{{ $country->country }}">{{ $country->flag }}</span>
              <div>
                <h6 class="mb-0 fw-semibold text-dark">{{ $country->country }}</h6>
                <small class="text-muted">{{ number_format($country->total_visits) }} visits &bull; {{ number_format($country->unique_visitors) }} unique</small>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 ms-auto" style="min-width: 140px; max-width: 180px;">
              <div class="progress w-100 rounded-pill" style="height: 6px; background-color: #e9ecef;">
                <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: {{ $country->percentage }}%" aria-valuenow="{{ $country->percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <span class="fw-bold text-dark small" style="min-width: 45px; text-align: right;">{{ $country->percentage }}%</span>
            </div>
          </div>
        @empty
          <div class="text-center py-4 text-muted">
            <i class="bx bx-globe fs-1 text-muted d-block mb-2"></i>
            No country traffic recorded yet.
          </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Top Pages -->
  <div class="col-12 col-lg-6">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div>
          <h5 class="card-title mb-1 fw-semibold">Top Visited Pages</h5>
          <p class="text-muted small mb-0">Most popular pages by traffic</p>
        </div>
        <span class="badge bg-label-secondary">{{ count($topPages) }} Pages</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th class="ps-4">Page URL</th>
              <th class="text-center">Views</th>
              <th class="text-center pe-4">Unique</th>
            </tr>
          </thead>
          <tbody>
            @forelse($topPages as $page)
              <tr>
                <td class="ps-4">
                  <div class="d-flex align-items-center gap-2">
                    <i class="bx bx-file text-primary"></i>
                    <span class="fw-medium text-dark text-truncate" style="max-width: 220px;" title="{{ $page->path }}">{{ $page->path }}</span>
                  </div>
                </td>
                <td class="text-center">
                  <span class="badge bg-label-primary px-2 py-1">{{ number_format($page->total_views) }}</span>
                </td>
                <td class="text-center pe-4">
                  <span class="text-muted small">{{ number_format($page->unique_views) }}</span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center py-4 text-muted">No page visit records yet.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Real-time Visitors Stream -->
<div class="row g-4">
  <div class="col-12">
    <div class="card h-100 shadow-sm border-0">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div>
          <h5 class="card-title mb-1 fw-semibold">Recent Visitors Log</h5>
          <p class="text-muted small mb-0">Live real-time visit stream with country & device details</p>
        </div>
        <span class="badge bg-label-success"><span class="badge-dot bg-success me-1"></span> Live Log</span>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th class="ps-4">Country & Location</th>
              <th>Device & OS</th>
              <th>Browser</th>
              <th>Visited Page</th>
              <th class="pe-4 text-end">Time</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentVisitors as $visitor)
              <tr>
                <!-- Country -->
                <td class="ps-4">
                  <div class="d-flex align-items-center gap-2">
                    <span class="fs-5">{{ \App\Models\Visitor::countryCodeToFlag($visitor->country_code) }}</span>
                    <div>
                      <span class="fw-semibold text-dark d-block">{{ $visitor->country ?: 'Unknown' }}</span>
                      @if($visitor->city)
                        <small class="text-muted">{{ $visitor->city }}</small>
                      @endif
                    </div>
                  </div>
                </td>

                <!-- Device & OS -->
                <td>
                  <div class="d-flex align-items-center gap-2">
                    @if($visitor->device === 'Mobile')
                      <span class="badge bg-label-success p-1 rounded"><i class="bx bx-mobile-alt"></i></span>
                    @elseif($visitor->device === 'Tablet')
                      <span class="badge bg-label-info p-1 rounded"><i class="bx bx-tab"></i></span>
                    @else
                      <span class="badge bg-label-primary p-1 rounded"><i class="bx bx-desktop"></i></span>
                    @endif
                    <div>
                      <span class="fw-medium text-dark d-block">{{ $visitor->device }}</span>
                      <small class="text-muted">{{ $visitor->platform }}</small>
                    </div>
                  </div>
                </td>

                <!-- Browser -->
                <td>
                  <span class="badge bg-label-secondary px-2 py-1">{{ $visitor->browser }}</span>
                </td>

                <!-- Page -->
                <td>
                  <span class="text-dark small text-truncate d-inline-block" style="max-width: 200px;" title="{{ $visitor->path }}">{{ $visitor->path }}</span>
                </td>

                <!-- Time -->
                <td class="pe-4 text-end">
                  <span class="text-muted small" title="{{ $visitor->created_at->toDayDateTimeString() }}">{{ $visitor->created_at->diffForHumans() }}</span>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-4 text-muted">No recent visitors logged.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Embedded Analytics Data for ApexCharts -->
<script>
  window.visitorAnalyticsData = {
    dates: @json($chartDates),
    pageviews: @json($chartPageviews),
    uniques: @json($chartUniques),
    devices: {
      labels: ['Desktop', 'Mobile', 'Tablet'],
      series: [{{ $deviceStats['desktop'] }}, {{ $deviceStats['mobile'] }}, {{ $deviceStats['tablet'] }}]
    }
  };
</script>
@endsection

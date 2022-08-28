<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <h4 class="logo-text">IOT System</h4>
    </div>
    <div class="toggle-icon ms-auto">
      <i class="bi bi-chevron-double-left"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li class="{{ Request::is('/') ? 'mm-active' : '' }}">
      <a href="/">
        <div class="parent-icon">
          <i class="bi bi-house-door"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="menu-label">Panel Monitoring</li>
    <li class="{{ Request::is('monitoring/panel-1') ? 'mm-active' : '' }}">
      <a class="has-arrow" aria-expanded="true" href="/monitoring/panel-1">
        <div class="parent-icon">
          <i class="bi bi-circle"></i>
        </div>
        <div class="menu-title">Panel 1</div>
      </a>
      <ul class="mm-collapse {{ Request::is('monitoring/panel-1**') ? 'mm-show' : '' }}" style="">
        <li> 
          <a href="javascript:;">
            <i class="bi bi-arrow-right-short"></i>
            First Sensor
          </a>
        </li>
        <li> 
          <a href="javascript:;">
            <i class="bi bi-arrow-right-short"></i>
            Second Sensor
          </a>
        </li>
        <li> 
          <a href="javascript:;">
            <i class="bi bi-arrow-right-short"></i>
            Third Sensor
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-label">Motor Monitoring</li>
    <li>
      <a href="/monitoring/motor">
        <div class="parent-icon">
          <i class="bi bi-circle"></i>
        </div>
        <div class="menu-title">Motor 1</div>
      </a>
    </li>
  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->
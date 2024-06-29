    <div class="sidebar-header">
        <div>
          <img src="{{asset('images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
          <h4 class="logo-text">Fobia</h4>
        </div>
    </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
      <li class="menu-label">Menu Utama</li>
        <li>
          <a href="/">
            <div class="parent-icon">
              <ion-icon name="home-outline"></ion-icon>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>
        <li>
          <a href="{{route('barang.index')}}">
            <div class="parent-icon">
              <ion-icon name="book"></ion-icon>
            </div>
            <div class="menu-title">Barang</div>
          </a>
        </li>
        <li>
          <a href="{{route('penjualan.index')}}">
            <div class="parent-icon">
              <ion-icon name="bag-handle-outline"></ion-icon>
            </div>
            <div class="menu-title">Penjualan</div>
          </a>
        </li>

      </ul>

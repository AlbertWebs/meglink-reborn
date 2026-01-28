<nav class="mobile-bottom-nav">
  <div class="mobile-bottom-nav-container">
    <a href="{{ route('home') }}" class="mobile-nav-item @if(isset($page) && $page == 'home') active @endif">
      <i class="fas fa-home"></i>
      <span>Home</span>
    </a>
    <a href="{{ route('land-for-sale') }}" class="mobile-nav-item @if(isset($page) && $page == 'land') active @endif">
      <i class="fas fa-map-marker-alt"></i>
      <span>Property</span>
    </a>
    <a href="{{ route('project-management-consultants') }}" class="mobile-nav-item @if(isset($page) && $page == 'pm-consultants') active @endif">
      <i class="fas fa-project-diagram"></i>
      <span>Projects</span>
    </a>
    <a href="{{ route('services') }}" class="mobile-nav-item @if(isset($page) && $page == 'services') active @endif">
      <i class="fas fa-cogs"></i>
      <span>Services</span>
    </a>
  </div>
</nav>

<style>
  .mobile-bottom-nav {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #ffffff;
    border-top: 1px solid rgba(16, 19, 24, 0.1);
    box-shadow: 0 -4px 20px rgba(16, 19, 24, 0.08);
    z-index: 1000;
    padding: 8px 0;
    padding-bottom: calc(8px + env(safe-area-inset-bottom));
  }
  .mobile-bottom-nav-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    max-width: 100%;
    margin: 0 auto;
    padding: 0 8px;
  }
  .mobile-nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex: 1;
    padding: 8px 4px;
    text-decoration: none;
    color: #5c6570;
    transition: all 0.3s ease;
    position: relative;
    min-height: 60px;
  }
  .mobile-nav-item i {
    font-size: 22px;
    margin-bottom: 4px;
    transition: all 0.3s ease;
  }
  .mobile-nav-item span {
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
  }
  .mobile-nav-item.active {
    color: #f37920;
  }
  .mobile-nav-item.active i {
    color: #f37920;
    transform: scale(1.1);
  }
  .mobile-nav-item.active span {
    color: #f37920;
    font-weight: 700;
  }
  .mobile-nav-item:active {
    transform: scale(0.95);
  }
  .mobile-nav-item:hover {
    color: #f37920;
  }
  .mobile-nav-item:hover i {
    color: #f37920;
  }
  @media (max-width: 991px) {
    .mobile-bottom-nav {
      display: block;
    }
    body {
      padding-bottom: 76px;
    }
    /* Adjust WhatsApp button position on mobile */
    .whatsapp-float {
      bottom: 90px !important;
    }
  }
  @media (max-width: 767px) {
    .mobile-nav-item {
      padding: 6px 2px;
      min-height: 56px;
    }
    .mobile-nav-item i {
      font-size: 20px;
      margin-bottom: 3px;
    }
    .mobile-nav-item span {
      font-size: 10px;
    }
    body {
      padding-bottom: 72px;
    }
    .whatsapp-float {
      bottom: 85px !important;
    }
  }
</style>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Chat</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Messages
            </a>
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link collapsed" href="/dashboard" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Dashboard
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
            </div>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
            </div>
            <div class="sb-sidenav-menu-heading">Ticket</div>
            <a class="nav-link" href="/tickets">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Issue
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
        Start Bookstrap
        {{ Auth::user()->name }}
    </div>
</nav>
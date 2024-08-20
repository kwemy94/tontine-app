<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('logo/favicon-32x32.png') }}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">KP-App</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('tontine.index') }}" class="menu-link">
                        <div data-i18n="Tontines">Tontines</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <div data-i18n="user">Utilisateurs</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('tirage.index') }}" class="menu-link">
                        <div data-i18n="user">Tirages</div>
                    </a>
                </li>


            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Opérations</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('paiement.current-user') }}" class="menu-link">
                        <div data-i18n="Tontines">Mes cotisations</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('current-user.tontine') }}" class="menu-link">
                        <div data-i18n="Tontines">Mes tontines</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('paiements.index') }}" class="menu-link">
                        <div data-i18n="user">Liste des paiements</div>
                    </a>
                </li>

            </ul>
        </li>



    </ul>
</aside>

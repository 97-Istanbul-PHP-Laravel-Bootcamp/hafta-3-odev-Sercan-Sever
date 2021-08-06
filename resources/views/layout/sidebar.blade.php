<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ route('admin.index') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Kategoriler</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ route('admin.category.create') }}">Kategori Ekleme</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('admin.category.list') }}">Kategori Listesi</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Ürünler</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('admin.product.create') }}">Ürün Ekleme</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('admin.product.list') }}">Ürün Listesi</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-cart-fill"></i>
                    <span>Satışlar</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ route('admin.sales.list') }}">Satış Listesi</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">Kullanıcılar &amp; Özelleştirme</li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Kullanıcılar</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('admin.user.create') }}">Kullanıcı Ekleme</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('admin.user.list') }}">Kullanıcı Listesi</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>

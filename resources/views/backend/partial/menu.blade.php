@if (check('Home'))
    <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
@endif
 @if ($n = check('Store'))
    <li class="nav-item">
         @if ($n->show)
        <a href="{{ route('merchant.store.index') }}" class="nav-link {{ Request::is('merchant/store-index') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>Store List</p>
        </a>
        @endif
    </li>
     @endif
    @if ($n = check('Category'))
    <li class="nav-item">
         @if ($n->show)
        <a href="{{ route('merchant.category.index') }}"
            class="nav-link {{ Request::is('merchant/category-index') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>Category List</p>
        </a>
          @endif
    </li>
    @endif
 @if ($n = check('Category'))
    <li class="nav-item">
         @if ($n->show)
        <a href="{{ route('merchant.product.index') }}" class="nav-link {{ Request::is('merchant/product-index') ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>Product List</p>
        </a>
          @endif
    </li>
    @endif


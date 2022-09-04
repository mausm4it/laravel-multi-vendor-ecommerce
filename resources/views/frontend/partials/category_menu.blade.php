<div class="aiz-category-menu bg-white rounded @if(Route::currentRouteName() == 'home') shadow-sm" @else shadow-lg" id="category-sidebar" @endif>
    <div class="p-3 bg-primary d-none d-lg-block rounded-top all-category position-relative text-left text-center text-white">
        <span style="font-family: 'Mitr', sans-serif;" class="fw-600 fs-16 mr-3">{{ translate('Categories') }}</span>

    </div>
    <ul class="list-unstyled categories no-scrollbar py-2 ml-2 text-left">
        @foreach (\App\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
            <li style="font-family: 'Exo', sans-serif;" class="category-nav-element" data-id="{{ $category->id }}">
                <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-reset py-2 px-3 d-block">
                    <span class="cat-name">{{ $category->getTranslation('name') }}</span>
                </a>
                @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                    <div class="sub-cat-menu c-scrollbar-light rounded shadow-lg p-4">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>

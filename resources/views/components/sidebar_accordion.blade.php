<div class="sidebar-accordion">
    <button data-state="inactive" class="sidebar-accordion-trigger sidebar-item group">
        <img src="{{$icon}}" alt="">
        <span class="font-bold text-sm text-white uppercase">{{$title}}</span>

        <div class="sidebar-item-arrow">
            <img src="{{asset("images/sidebar-arrow.png")}}" class="rotate-0 group-data-[state=active]:-rotate-90 transition-all duration-200" alt="">
        </div>
    </button>

    <div class="sidebar-accordion-wrapper sidebar-accordion-collapsed" style="height: 0;">
        <div class="sidebar-accordion-content flex flex-col p-3 bg-gray-1000">
            @foreach ($links as $link)
                @if (!$link->allowed_roles || in_array($userRole, $link->allowed_roles))
                    <a
                        href="{{$link->href}}"
                        data-link-state="@if(Request::is($link->href)){{"active"}}@else{{"inactive"}}@endif"
                        class="p-3 rounded-lg data-[link-state=active]:bg-white/10 text-sm font-medium text-white transition-all hover:bg-white/5 data-[link-state=inactive]:active:bg-white/20"
                    >
                        {{$link->title}}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
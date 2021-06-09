@if(Admin::user()->visible(\Illuminate\Support\Arr::get($item, 'roles', [])) && Admin::user()->can(\Illuminate\Support\Arr::get($item, 'permission')))
    @if(!isset($item['children']))
        <li>
            @if(url()->isValidUrl($item['uri']))
                <a href="{{ $item['uri'] }}" target="_blank" style="display: flex">
                    @else
                        <a href="{{ admin_url($item['uri']) }}">
                            @endif
                            <i class="fa {{$item['icon']}}"></i>
                            @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                                <span>{{ __($titleTranslation) }}</span>
                            @else
                                <span>{{ admin_trans($item['title']) }}</span>
                            @endif
                            @switch($item['uri'])
                                @case('/auth-problems')
                                <div id="problems">
                                    <auth-problems count="0">
                                    </auth-problems>
                                </div>
                                @break

                                @case('/new-chats')
                                <span style="
                            padding: 5px;
                            border-radius: 5px;
                            margin-left: 10px;
                            background: whitesmoke;
                            color: black">
                                5
                            </span>
                                @break

                                @case('/chats')
                                <span style="
                            padding: 5px;
                            border-radius: 5px;
                            margin-left: 10px;
                            background: whitesmoke;
                            color: black">
                                5
                            </span>
                                @break

                                @default
                            @endswitch
                        </a>
        </li>
    @else
        <li class="treeview">
            <a href="#">
                <i class="fa {{ $item['icon'] }}"></i>
                @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                    <span>{{ __($titleTranslation) }}</span>
                @else
                    <span>{{ admin_trans($item['title']) }}</span>
                @endif
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @foreach($item['children'] as $item)
                    @include('admin::partials.menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@endif

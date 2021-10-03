@if(Admin::user()->visible(\Illuminate\Support\Arr::get($item, 'roles', [])) && Admin::user()->can(\Illuminate\Support\Arr::get($item, 'permission')))
    @if(!isset($item['children']))
        <li>
            @if(url()->isValidUrl($item['uri']))
                <a href="{{ $item['uri'] }}" target="_blank">
                    @else
                        <a href="{{ admin_url($item['uri']) }}" style="display: flex">
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
                                    <auth-problems>
                                    </auth-problems>
                                </div>
                                @break

                                @case('/chats')
                                <div id="chatsCount">
                                    <chats-count>
                                    </chats-count>
                                </div>
                                @break

                                @case('/profile-requests')
                                <div id="profileRequestsCount">
                                    <profile-requests-count>
                                    </profile-requests-count>
                                </div>
                                @break

                                @case('/vacation-requests')
                                <div id="vacationRequestsCount">
                                    <vacation-requests-count>
                                    </vacation-requests-count>
                                </div>
                                @break

                                @case('/material-requests')
                                <div id="materialSupportRequestsCount">
                                    <material-support-requests-count>
                                    </material-support-requests-count>
                                </div>
                                @break

                                @case('/document-requests')
                                <div id="documentRequestsCount">
                                    <document-requests-count>
                                    </document-requests-count>
                                </div>
                                @break
                                @case('/vacation-approve')
                                <div id="vacationApproveCount">
                                    <vacation-approve-count>
                                    </vacation-approve-count>
                                </div>
                                @break
                                @case('/absence-approve')
                                <div id="absenceApproveCount">
                                    <absence-approve-count>
                                    </absence-approve-count>
                                </div>
                                @break
                                @case('/exports')
                                <div id="exportsCount">
                                    <exports-count>
                                    </exports-count>
                                </div>
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

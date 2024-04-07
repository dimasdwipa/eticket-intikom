

    <li class="nav-item dropdown pe-2 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0"  wire:click="show"
            aria-expanded="false">
            <i class="fa fa-bell cursor-pointer"></i> {!! $countmasse !!}
        </a>
        <div class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4 {{$showdata}}"
            style="min-width:325px; z-index: 9999999999999; " aria-labelledby="dropdownMenuButton">

            @if (auth()->check())
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <div class="mb-2">
                        <Form method="post" class="dropdown-item border-radius-md alert  alert-sm alert-info text-white" action="{{ route("notif") }}">
                            @csrf
                            <input type="hidden" name="url" value="{{ url($notification->data['link']??'#') }}">
                            <input type="hidden" name="id" value="{{$notification->id }}">
                            <button type="submit" class="d-flex py-0 alert-info text-white" style="border:none" role="alert"
                               >
                                <div class="my-auto">
                                    <img src="{{ url('assets') }}/img/robot.gif" class="avatar  me-3 ">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal" style="width: 100%">
                                        <span class="font-weight-bold text-white">{{ $notification->data['title']??""
                                            }}</span>
                                        <div class="text-white">

                                            {{ $notification->data['message']??"" }}
                                        </div>
                                    </h6>
                                    <div class="text-xs mb-0 text-white text-right" style="min-width: 200px">
                                        <i class="fa fa-clock me-1"></i>{{ $notification->created_at->diffForHumans() }}
                                    </div>

                                </div>
                            </button>
                        </Form>
                    </div>
                @endforeach
            @endif

        </div>
    </li>

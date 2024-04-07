<div>
    <span style="display: hiden" wire:poll.5000ms="aa"></span>
    @if (auth()->user()->unreadNotifications->where('read_at',null)->where('notif_up',null)->count()>0)

    <div role="alert"
        style="display: hiden;z-index: 20;position: fixed;right: 4rem;top: 4rem; background-color:transpart"
        wire:poll.5000ms="notif_up"
        >

        @foreach (auth()->user()->unreadNotifications->where('read_at',null)->where('notif_up',null) as $notification)
            <Form method="post" action="{{ route("notif") }}">
                @csrf
                <input type="hidden" name="url" value="{{ url($notification->data['link']??'#') }}">
                <input type="hidden" name="id" value="{{$notification->id }}">
                <button   type="submit" class="d-flex py-1 alert  alert-sm alert-info text-white" style="border:none" role="alert">
                        <div class="my-auto">
                            <img src="{{ url('assets') }}/img/robot.gif" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column" style="width: 300px">
                            <div class=" text-white text-left" style="text-align: left">Hello, {{ auth()->user()->name }}</div>
                            <div class="text-white m-0"  style="text-align: left" > 
                                <strong>{{ $notification->data['title']??""}}</strong>
                                {{$notification->data['message']??"" }}
                            </div>
                        </div>
                </button>
            </Form>
        @endforeach
    </div>
    @endif
</div>

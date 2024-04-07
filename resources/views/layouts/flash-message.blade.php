@if ($message = Session::get('success'))
    <div role="alert" class="alert alert-dismissible m-4 px-2 fade show alert-sm alert-success  alert-block"
        style="padding: 0.2rem;z-index: 20;position: fixed;right: 1px;top: 34px;box-shadow: 0 0.5rem 0.9rem #d6d192d9;">
        <em class="m-0 p-0 text-white">{{ $message }}</em>

        <button type="button" style="float: right;padding: 0.15rem;margin:auto" class="close alert mx-2 p-0  text-white"
            data-dismiss="alert" id="close_alert" aria-label="Closed">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
@endif
@if ($message = Session::get('error'))
    <div role="alert" class="alert alert-dismissible m-4 px-2 fade show alert-sm alert-danger  alert-block"
        style="padding: 0.2rem;z-index: 20;position: fixed;right: 1px;top: 34px;box-shadow: 0 0.5rem 0.9rem #d6d192d9;">
        <em class="m-0 p-0 text-white">{{ $message }}</em>

        <button type="button" style="float: right;padding: 0.15rem;margin:auto"
            class="close alert mx-2 p-0  text-white" data-dismiss="alert" id="close_alert" aria-label="Closed">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
@endif
@if ($message = Session::get('warning'))
    <div role="alert" class="alert alert-dismissible m-4 px-2 fade show alert-sm alert-warning alert-block"
        style="padding: 0.2rem;z-index: 20;position: fixed;right: 1px;top: 34px;box-shadow: 0 0.5rem 0.9rem #d6d192d9;">
        <em class="m-0 p-0 text-white">{{ $message }}</em>

        <button type="button" style="float: right;padding: 0.15rem;margin:auto"
            class="close alert mx-2 p-0  text-white" data-dismiss="alert" id="close_alert" aria-label="Closed">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
@endif
@if ($message = Session::get('info'))
    <div role="alert" class="alert alert-dismissible m-4 px-2 fade show alert-sm alert-info alert-block"
        style="padding: 0.2rem;z-index: 20;position: fixed;right: 1px;top: 34px;box-shadow: 0 0.5rem 0.9rem #d6d192d9;">
        <em class="m-0 p-0 text-white">{{ $message }}</em>

        <button type="button" style="float: right;padding: 0.15rem;margin:auto" class="close alert mx-2 p-0 text-white"
            data-dismiss="alert" id="close_alert" aria-label="Closed">
            <span aria-hidden="true">&times;</span>
        </button>


    </div>
@endif
@if ($errors->any())
    <div role="alert" class="alert alert-dismissible mx-4 fade show alert-smmy-1 alert-danger text-white"
        style="padding: 0.2rem;z-index: 20;position: fixed;right: 1px;top: 4rem;box-shadow: 0 0.5rem 0.9rem #d6d192d9;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    <em>{{ $error }}</em>

                    <button type="button" style="float: right;padding: 0.15rem;margin:auto"
                        class="close alert mx-2 p-0 text-white" data-dismiss="alert" id="close_alert"
                        aria-label="Closed">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
@endif

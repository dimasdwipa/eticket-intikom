@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td colspan="3">
            <div style="text-align:left">Hi, {{$user->name}}</div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align:left;padding-bottom:10px">{{ $body1 }}</div>
        </td>
    </tr>


    <tr>
        <td>
            <div style="text-align:left">Agent </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->ticket->agent->name??'' }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Supervisor </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->ticket->supervisor->name??'' }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Code </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">#{{$data->ticket->code }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Category </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{$data->ticket->katagori->kategori??'' }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Sub Category </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->ticket->sub_katagori->sub_kategori ?? '' }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Problem </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->ticket->problem }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Ticket Requestor</div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->ticket->user->name }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Information </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->status }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Extend SLA </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->extend_SLA==null?$data->extend_response_SLA:$data->extend_SLA }} (Minutes)</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Start Date </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->sla_request }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">End Date </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->sla_request_end }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Reason </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->comment }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Note </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->note }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Status </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->approve }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Action</div>
        </td>
        <td> : </td>
        <td>
            @if($user->role=="supervisor")
                <div style="text-align:left"><a class="button" href="{{ url('supervisor-request-extend?alltype=1&start_date='.$data->created_at.'&end_date='.$data->created_at.'&filter_by=complains.id&keyword='.$data->id) }}">Show</a></div>
            @elseif($user->role=="agent")
                <div style="text-align:left"><a class="button" href="{{ url('agent/create?alltype=1&start_date='.$data->created_at.'&end_date='.$data->created_at.'&filter_by=complains.id&keyword='.$data->id) }}">Show</a></div>
            @elseif($user->role=="user")
                <div style="text-align:left"><a class="button" href="{{ url('summary-report?alltype=1&start_date='.$data->created_at.'&end_date='.$data->created_at.'&filter_by=complains.id&keyword='.$data->id) }}">Show</a></div>
            @endif

        </td>
    </tr>
</table>

<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
       <div style="text-align:left">
       <br>
                <br>
                Terima kasih.
                <br><br>
                Regards,
                <br>
                Ticketing Intikom (TIKOM)<br>
            </div>
    </tr>
</table>
@endsection

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
            <div style="text-align:left;padding-bottom:15px">The ticket <strong>#{{ $data->code }}</strong> has been <strong>{{ $data->status }}</strong> by the system, as there was no response within 24 hours of the ticket being resolved.</div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align:left;padding-bottom:10px"><strong>Ticket details</strong></div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Requestor </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->user->name }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Agent </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->agent->name??'' }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Supervisor </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->supervisor->name??'' }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Category </div>
        </td>
        <td> : </td>
        <td>
          
            <div style="text-align:left">{{ $data->katagoriAllTeams->kategori ?? '' }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Sub Category </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->sub_katagoriAllTeams->sub_kategori ?? '' }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Problem </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->problem }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Solution </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $data->solution }} </div>
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
</table>

<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
             <div style="text-align:left">
                <br>
                <br>
                Regards,
                <br>
                Ticketing Intikom (TIKOM)<br>
            </div>
        </td>
    </tr>
</table>
@endsection

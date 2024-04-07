@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left">Hi, {{$user->name}}</div>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">This ticket has been resolved or closed, don't forget to rate this ticket service</div>
        </td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td cellpadding="0" cellspacing="0"  style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;;text-align: center;font-weight: bold">No Ticket</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;;text-align: center;font-weight: bold">Problem</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;;text-align: center;font-weight: bold">Status</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;;text-align: center;font-weight: bold">Action</td>
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000">#{{$data->code}}</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000">{{$data->problem}}</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000; text-align: center">{{$data->status}}</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000; text-align: center"><a class="button" href="{{ url('my-ticket?start_date=&end_date=&filter_by=code&keyword='.$data->code) }}">Show</a></td>
    </tr>

</table>
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left;padding-top:20px">
                Please contact the user to follow up on complaints received.
            </div>
        </td>
    </tr>
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

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
            <div style="text-align:left;padding-bottom:10px">{{ $body1 }}</div>
        </td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td cellpadding="0" cellspacing="0" >Ticket No</td>
        <td cellpadding="0" cellspacing="0">: <a href="@if($data->status=="Awaiting Response") {{ url('sa/my-ticket?start_date='.date_format($data->created_at,'Y-m-d').'&end_date=&filter_by=code&keyword='.($data->code??$data->ticket->code)) }} @else {{ url('sa/summary-report?start_date=&end_date=&filter_by=code&keyword='.($data->code??$data->ticket->code)) }}@endif">#{{$data->first()->code}}</a></td>
        <td cellpadding="0" cellspacing="0" >Ticket Date</td>
        <td cellpadding="0" cellspacing="0">: {{$data->tanggal}}</td>
       
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0" >For Company</td>
        <td cellpadding="0" cellspacing="0">: {{$data->customer}}</td>
        <td cellpadding="0" cellspacing="0" >CRM No / Ref No</td>
        <td cellpadding="0" cellspacing="0">: {{$data->no_CRM}}</td>
    </tr>
</table>
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left;padding-top:20px">
                {{ $body2 }}
            </div>
        </td>
    </tr>
    <tr>
       <div style="text-align:left">
                <br><br>
                Regards,
                <br>
                Ticketing Intikom (TIKOM)<br>
            </div>
    </tr>
</table>
@endsection

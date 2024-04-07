@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left">Dear {{$user->name}}</div>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">Making SO {{$data->sub_katagori->sub_kategori}} for ticket no. : {{$data->code}} date : {{$data->tanggal}}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">On behalf of  {{$data->customer}}  with No CRM / No Ref : {{$data->no_CRM}}</div>
        </td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">This Ticket has been completed and the result is SO {{$data->sub_katagori->sub_kategori}} No. : {{$data->doc_no}}, date : {{$data->date_finish}}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">Please check the results, the ticket is processed close (If there is no correction) and an assessment of the work is given</div>
        </td>
    </tr>


</table>
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left;padding-top:20px">
            Your assessment of our work is very meaningful to improve our achievements. Thank You.
            </div>
        </td>
    </tr>
    <tr>
       <div style="text-align:left">
       <br>
                <br>
                Regards,
                <br><br>
                Nama Sales Admin/agent,
                <br>
                {{$data->agent->name}}<br>
            </div>
    </tr>
</table>
@endsection

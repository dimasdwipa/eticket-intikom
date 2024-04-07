@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td colspan="3">
            <div style="text-align:left">Dear {{$user->name}}</div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align:left;padding-bottom:10px">Your ticket No. :  {{$data->ticket->code}}, Date : {{$data->ticket->tanggal}} will be processed :</div>
        </td>
    </tr>


    <tr>
        <td>
            <div style="text-align:left">Description :</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">{{ $data->comment??'' }} </div>
        </td>
    </tr>
   
    <tr>
        <td>
            <div style="text-align:left">Note :</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">{{ $data->note??'' }} </div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align:left;padding-bottom:10px">That's what we inform</div>
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

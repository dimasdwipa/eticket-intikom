@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left">Dear {{$data->first()->user->name}},</div>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">Terima kasih atas tiket anda, berikut detail tiket yang telah dikirim :</div>
        </td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td cellpadding="0" cellspacing="0"  style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;text-align: center;font-weight: bold">No Ticket</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;text-align: center;font-weight: bold">Problem</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 5px;color:#010f22;background: #D8D8D8;text-align: center;font-weight: bold">Status</td>
    </tr>
    @foreach($data as $item)
    <tr>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000">#{{$item->code}}</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000">{{$item->problem}}</td>
        <td cellpadding="0" cellspacing="0" style="border:solid 1px #000000;padding: 4px 10px;color:#000000; text-align: center">{{$item->status}}</td>
    </tr>
    @endforeach

</table>
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left;padding-top:20px">
            System akan menunjuk Agen untuk membantu menangani tiket anda.
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

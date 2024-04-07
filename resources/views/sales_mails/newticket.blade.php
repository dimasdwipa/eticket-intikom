@extends('layouts.mail')

@section('content')

<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td>
            <div style="text-align:left">Dear Sales Admin ({{$data->first()->agent->name}}),</div>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;padding-bottom:10px">Please create an SO ({{$data->first()->sub_katagori->sub_kategori}}) with the following data : :</div>
        </td>
    </tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td cellpadding="0" cellspacing="0" >Ticket No</td>
        <td cellpadding="0" cellspacing="0">: #{{$data->first()->code}}</td>
        <td cellpadding="0" cellspacing="0" >Ticket Date</td>
        <td cellpadding="0" cellspacing="0">: {{$data->first()->tanggal}}</td>
       
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0" >For Company</td>
        <td cellpadding="0" cellspacing="0">: {{$data->first()->customer}}</td>
        <td cellpadding="0" cellspacing="0" >CRM No / Ref No</td>
        <td cellpadding="0" cellspacing="0">: {{$data->first()->no_CRM}}</td>
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0" >Transaction For BU </td>
        <td cellpadding="0" cellspacing="0">: {{$data->first()->bu}}</td>
    </tr>
 

</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td cellpadding="0" cellspacing="0" >Attachent :</td>
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0">Quatation ITK ( {{$data->first()->quot_itk==1?'Yes':'No'}} )</td>
        <td cellpadding="0" cellspacing="0">PO Customer  ( {{$data->first()->po_customer==1?'Yes':'No'}} )</td>
        <td cellpadding="0" cellspacing="0">PO Supplier ( {{$data->first()->po_suplayer==1?'Yes':'No'}} )</td>
        <td cellpadding="0" cellspacing="0">Cost Sheet ( {{$data->first()->cost_sheet==1?'Yes':'No'}} )</td>
    </tr>
    <tr>
        <td cellpadding="0" cellspacing="0" >Other</td>
        <td cellpadding="0" cellspacing="0">: {{$data->first()->other}}</td>
    </tr>
</table>
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
       <div style="text-align:left">
       <br>
                <br>
                Thanks for your support.
                <br><br>
                Regards,
                <br>
                ({{$data->first()->user->name}})<br>

            </div>
    </tr>
</table>
@endsection

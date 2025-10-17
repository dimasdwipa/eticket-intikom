@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td colspan="3">
            <div style="text-align:left">Dear {{ $toku }},</div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align:left;padding-bottom:10px">
                We are writing to inform you about the recent asset transaction. Below are the details:
            </div>
        </td>
    </tr>

    <!-- Transaction Details -->
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Transaction Code:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->code }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Transaction Type:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->transaction_type }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Transaction Date:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->transaction_date }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Est Return Date:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->est_return_date }}</div>
        </td>
    </tr>

    <!-- Asset Details -->
    <tr>
        <td colspan="3" style="padding-top:15px;">
            <div style="text-align:left;font-weight:bold;">Asset Detail:</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Tag Asset:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->tag_asset }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Item Name:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->nama_item }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Asset Condition :</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->condition_asset }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Description:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->deskripsi }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Brand:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->merek }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Model Type:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $asset->model_type }}</div>
        </td>
    </tr>

    <!-- User/Agent Information -->
    <tr>
        <td colspan="3" style="padding-top:15px;">
            <div style="text-align:left;font-weight:bold;">User/Agent Information:</div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div style="text-align:left;font-weight:bold;">User: {{ $assetRequest->user->name }} ({{ $assetRequest->user->email }})</div>
        </td>
        
    </tr>
    <tr>
        <td >
             <br>
             <br>
             <br>
             ttd
            <hr>
        </td>
        <td>

        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div style="text-align:left;font-weight:bold;">Agent: {{ $assetRequest->agent->name }} ({{ $assetRequest->agent->email }})</div>
        </td>
        <td>
        </td>
        
    </tr>
    <tr>
        <td >
        <br>
             <br>
             <br>
             ttd
            <hr>
        </td>
    </tr>
</table>

<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
       <td>
           <div style="text-align:left;padding-top:15px;">
                Thank you.
                <br><br>
                Regards,
                <br>
                Ticketing Intikom (TIKOM)<br>
           </div>
       </td>
    </tr>
</table>
@endsection

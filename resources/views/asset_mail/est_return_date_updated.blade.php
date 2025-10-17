@extends('layouts.mail')

@section('content')
<table style="width:100%;max-width:100%;color:#000000;">
    <tr>
        <td colspan="3">
            <div style="text-align:left">Dear {{ $updatedBy }},</div>
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
                We want to inform you that the estimated return date for an asset has been updated. Below are the updated details:
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
            <div style="text-align:left;font-weight:bold;">Previous Estimated Return Date:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->est_return_date }}</div>
        </td>
        <td>
            <div style="text-align:left;font-weight:bold;">Previous Estimated Return Date:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $assetRequest->est_return_date }}</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Updated Estimated Return Date:</div>
        </td>
        <td>
            <div style="text-align:left;">{{ $newDate }}</div>
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

    <!-- User Information -->
    <tr>
        <td colspan="3" style="padding-top:15px;">
            <div style="text-align:left;font-weight:bold;">User Information:</div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left;font-weight:bold;">Updated By:</div>
        </td>
        <td>
            <div style="text-align:left;">{{  $assetRequest->user->name}}</div>
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

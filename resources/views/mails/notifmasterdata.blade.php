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
            <div style="text-align:left;padding-bottom:10px">Master data {{ $master }} has been modified by {{ Auth::user()->name }}</div>
        </td>
    </tr>


    <tr>
        <td>
            <div style="text-align:left">Change type  </div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">{{ $type }} </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">New data {{ $master }}</div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">

                @if ($master=="location")
                    {{ $old->lokasi }}
                @elseif($master=="category")
                    {{ $old->kategori }}
                @else
                    {{ $old->sub_kategori }} @if ($type=="New") by category {{ $new->katagori->kategori }} @endif
                @endif
            </div>
        </td>
    </tr>
    @if ($type=="Update")
        <tr>
            <td>
                <div style="text-align:left">Old data {{ $master }}</div>
            </td>
            <td> : </td>
            <td>
                <div style="text-align:left">
                    <div style="text-align:left">
                        @if ($master=="location")
                            {{ $new->lokasi }}
                        @elseif($master=="category")
                            {{ $new->kategori }}
                        @else
                            {{ $new->sub_kategori }}</sub>
                        @endif
                    </div>
                </div>
            </td>
        </tr>

    @endif

    @if($master=="Sub Category")
    <tr>
        <td>
            <div style="text-align:left">Extend ticket SLA</div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">
                {{ $old->extend_ticket_SLA_default }}
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="text-align:left">Extend response SLA</div>
        </td>
        <td> : </td>
        <td>
            <div style="text-align:left">
                {{ $old->extend_response_SLA_default }}
            </div>
        </td>
    </tr>
    @endif

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

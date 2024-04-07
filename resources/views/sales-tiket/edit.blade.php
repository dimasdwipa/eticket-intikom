@extends('layouts.app', ['page' => 'Update SA Ticket', 'pageSlug' => 'Update SA Ticket', 'section' => 'Update SA Ticket'])

@section('content')

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('sa.sales-ticket.update',['sales_ticket'=>$data->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="team_id" value="3">
            <input type="hidden" name="lokasi_id" value="1">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                        <h6 class="text-white text-capitalize ps-3">Update Ticket</h6>
                    </div>
                </div>
                <div class="card-body px-5 pb-2">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-6">
                            <label class="text-dark ">Category</label>
                            <div class="input-group input-group-static mb-4">
                                <select class="form-control form-select katagori" name="subkategori" required>
                                    @foreach ($subkategori as $item)
                                    <option value="{{ $item->id }}" @if($item->id==$data->sub_katagori_id) selected @endif>{{ $item->sub_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static mb-4">
                                <label for="text-dark">Ticket Date</label>
                                <input type="text" class="form-control" value="{{ date('d M Y') }}" readonly required>
                                <input type="hidden" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static mb-4">
                                <label for="text-dark">Customer</label>
                                <input type="text-dark" class="form-control" name="customer" value="{{$data->customer}}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static mb-4">
                                <label for="text-dark">CRM No. / Ref. No</label>
                                <input type="text-dark" class="form-control" name="no_CRM" value="{{$data->no_CRM}}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark ">Base Unit</label>
                            <div class="input-group input-group-static mb-4">
                                <select class="form-control form-select base_unit" name="bu" onchange="getCombo(this)"
                                    placeholder="Salect BU" required>
                                    <option></option>
                                    @foreach ($base_unit as $item)
                                    <option value="{{ $item->id }}" class="{{$item->user_id}}" @if($item->code==$data->bu) selected @endif>
                                        {{ $item->code }}-{{ $item->desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark ">Sales Admin</label>
                            <div class="input-group input-group-static mb-4">
                                <select class="form-control form-select sales_admin" name="sales_admin"
                                    placeholder="Salect SA" required>
                                    <option></option>
                                    @foreach ($sales_admin as $item)
                                    <option value="{{ $item->id }}" class="{{$item->id}}" @if($item->id==$data->agent_id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12 col-md-12">
                            <div class="control-group" id="fields">
                                <label class="control-label text-dark" for="field1">
                                    CC Email
                                </label>
                                <div class="controls-email">
                                    @foreach($data->cc_mails as  $item)
                                        @if($item!==null)
                                            <div class="entry-email input-group upload-input-group">
                                                <input class="form-control form-control-sm bg-white border border-secondar" value="{{$item}}" name="cc_mails[]" type="email" onfocus="focused(this)" onfocusout="defocused(this)">
                                                <button class="btn btn-sm btn-upload btn-remove-email btn-danger" type="button"><span class="fa fa-trash" aria-hidden="true"></span></button>
                                            </div>
                                        @endif 
                                    @endforeach
                                    <div class="entry-email input-group upload-input-group">
                                        <input class="form-control form-control-sm bg-white border border-secondar" name="cc_mails[]" type="email" >
                                        <button class="btn btn-sm btn-upload btn-success btn-add-email" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-gray-700">
                        <div class="card-body bg-gray-500">
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Description</label>
                                <textarea class="form-control form-control-sm bg-white"
                                    style="border-radius:0.25rem !important" rows="5" name="problem">{{$data->problem}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card bg-gray-700">
                        <div class="card-body bg-gray-500">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">Quot-ITK</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="quot_itk" @if($data->quot_itk==1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">PO Customer</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="po_customer" @if($data->po_customer==1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">PO Suplayer</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="po_suplayer" @if($data->po_suplayer==1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">Cost Sheet</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="cost_sheet" @if($data->cost_sheet==1) checked @endif>
                                    </div>
                                </div>
                                <div class="col-sm-12 ">
                                    <div class=" mb-4">
                                        <label class="text-dark">Other</label>
                                        <input type="text-dark" class="form-control bg-white " name="other" value="{{$data->other}}">
                                    </div>
                                </div>
                            </div>                           
                            <div class="row form-group">
                                <div class="col-12 col-md-12">
                                    <div class="control-group" id="fields">
                                        <label class="control-label" for="field1">
                                            Upload Files
                                        </label>
                                        @foreach ($data->file_manager as $value_file)
                                            <div class="entry input-group upload-input-group">
                                                <input class="form-control form-control-sm bg-white" value="{{$value_file->file}}" name="files" type="text" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                                <button class="btn btn-sm btn-upload btn-remove btn-danger" onclick="handleButtonClick({{$value_file->id}})" type="button"><span class="fa fa-trash" aria-hidden="true"></span></button>
                                            </div>
                                        @endforeach
                                        <div class="controls">
                                             <div class="entry input-group upload-input-group">
                                                    <input class="form-control form-control-sm bg-white" name="files[]"
                                                    type="file">
                                                    <button class="btn btn-sm btn-upload btn-success btn-add" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-gray-700">
                            <div class="card-body bg-gray-500">
                                <div class="input-group input-group-static mb-4 rows ">
                                    <div class="col-12">
                                        <label class="text-dark">Priority</label>
                                    </div>
                                    <div class="col-12 bg-white">
                                        <select class="form-control form-control-sm" name="prioritas" >
                                            <option value="low" @if($data->prioritas=='low') selected @endif>Low</option>
                                            <option value="normal" @if($data->prioritas=='normal') selected @endif>Normal</option>
                                            <option value="high" @if($data->prioritas=='high') selected @endif>High</option>
                                            <option value="urgent"  @if($data->prioritas=='urgent') selected @endif>Urgent</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Reson Update</label>
                                <textarea class="form-control form-control-sm bg-white"
                                    style="border-radius:0.25rem !important" rows="5" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-footer" style="text-align: right">
                    <button type="submit" class="btn btn-primary">Send Ticket</button>
                </div>
            </div>
    </div>
    </form>
</div>
<style>
.upload-input-group {
    margin-bottom: 10px;
}

.input-group>.custom-select:not(:last-child),
.input-group>.form-control:not(:last-child) {
    height: 31px;
}
</style>
<script>
     function handleButtonClick(id) {
        $.ajax({
            url: "{{url('sa/sales-ticket/trush')}}"+'/'+id,
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            dataType: "json",
            success: function (response) {
                alert('file has been delete');
            }
        });
    }
$(document).ready(function() {

    $(function() {
        $(document).on('click', '.btn-add-email', function(e) {
            e.preventDefault();

            var controlForm = $('.controls-email:first'),
                currentEntry = $(this).parents('.entry-email:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry-email:not(:last) .btn-add-email')
                .removeClass('btn-add-email').addClass('btn-remove-email')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"></span>');
        }).on('click', '.btn-remove-email', function(e) {
            $(this).parents('.entry-email:first').remove();

            e.preventDefault();
            return false;
        });


        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-trash"></span>');
        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });

});

$(".katagori").select2();
$(".base_unit").select2();
$(".sales_admin").select2();

function getCombo(e) {

    $(document).ready(function() {


        var selectedOptionClass = $(e).find(':selected').attr('class');



        var $example = $(".sales_admin").select2();

        $example.val(null).trigger("change");
        $example.select2("destroy");

        var option = $example.find('.' + selectedOptionClass).attr('value');
        $example.val(option);
        $example.select2();
    });

}
</script>
@endsection
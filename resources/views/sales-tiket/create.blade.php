@extends('layouts.app', ['page' => 'Sales Admin Ticket', 'pageSlug' => 'Sales Admin Ticket', 'section' => 'Sales Admin
Ticket'])

@section('content')

<div class="row">
    <div class="col-12">
        <form method="POST" action="{{ route('sa.sales-ticket.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="team_id" value="3">
            <input type="hidden" name="lokasi_id" value="1">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                        <h6 class="text-white text-capitalize ps-3">Create Ticket</h6>
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
                                    <option value="{{ $item->id }}">{{ $item->sub_kategori }}</option>
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
                                <input type="text-dark" class="form-control" name="customer" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static mb-4">
                                <label for="text-dark">CRM No. / Ref. No</label>
                                <input type="text-dark" class="form-control" name="no_CRM" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark ">Base Unit</label>
                            <div class="input-group input-group-static mb-4">
                                <select class="form-control form-select base_unit" name="bu" onchange="getCombo(this)"
                                    placeholder="Salect BU" required>
                                    <option></option>
                                    @foreach ($base_unit as $item)
                                    <option value="{{ $item->id }}" class="{{$item->user_id}}">
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
                                    <option value="{{ $item->id }}" class="{{$item->id}}">{{ $item->name }}</option>
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
                    <div class="input-group input-group-static mb-4">
                        <label class="text-dark">Priority</label>
                        <select class="form-control form-control-sm Priority23" id="prioritas" name="prioritas" required>
                            <option class="prioritas0"  value="low">Low</option>
                            <option class="prioritas1"  value="normal">Normal</option>
                            <option class="prioritas2"  value="high">High</option>
                            <option class="prioritas3"  value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="card bg-gray-700">
                        <div class="card-body bg-gray-500">
                            <div class="input-group input-group-static mb-4">
                                <label class="text-dark">Description</label>
                                <textarea class="form-control form-control-sm bg-white"
                                    style="border-radius:0.25rem !important" rows="5" name="problem"></textarea>
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
                                        <input class="form-check-input" type="checkbox" value="1" name="quot_itk">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">PO Customer</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="po_customer">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">PO Suplayer</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="po_suplayer">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="custom-control-label text-dark">Cost Sheet</label>
                                        <input class="form-check-input" type="checkbox" value="1" name="cost_sheet">
                                    </div>
                                </div>
                                <div class="col-sm-12 ">
                                    <div class=" mb-4">
                                        <label class="text-dark">Other</label>
                                        <input type="text-dark" class="form-control bg-white " name="other">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="input-group input-group-static mb-1">
                                        <label class="text-dark">Choose file to upload (max. 2mb)</label>
                                        <input type="file" class="form-control form-control-sm bg-white px-1" style="border-radius:0.25rem !important" rows="5"
                                            name="files[]" multiple>
                                    </div> -->
                            <div class="row form-group">
                                <div class="col-12 col-md-12">
                                    <div class="control-group" id="fields">
                                        <label class="control-label" for="field1">
                                            Upload Files
                                        </label>
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
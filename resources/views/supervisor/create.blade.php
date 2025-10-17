@extends('layouts.app', ['page' => 'Tasking', 'pageSlug' => 'Tasking', 'section' => 'Tasking'])

@section('content')
    <div class="new-wrap" style="display: none;">
        <div class="card bg-gray-700  my-4">
            <div class="p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg ps p-3 row">

                <h6
                    class="col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 bg-gradient-primary shadow-primary border-radius-lg pt-1 pb-1 text-white text-capitalize ps-3">
                    Problem / Request <span class="ticket_nbr"></span></h6>
            </div>
            <div class="card-body bg-gray-500">
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Category</label>
                    <select class="form-control form-control-sm select23" onchange="getCombo(this)" name="katagori[]" required>
                        <option></option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Sub Category</label>
                    <select class="form-control form-control-sm SUBSelect2" name="subkategori[]" required>
                        <option></option>
                        @foreach ($subkategori as $item)
                            <option class="Katagori{{ $item->katagori_id }}" value="{{ $item->id }}">{{ $item->sub_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Agent</label>
                    <select class="form-control agent agent_id select22" name="agent_id[]" required>
                        <option></option>
                        @foreach ($agents as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">User</label>
                    <select class="form-control user user_id select88" name="user_id[]" >
                        <option></option>
                        @foreach ($user as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>


                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Priority</label>
                    <select class="form-control form-control-sm Priority23" id="prioritas0" name="prioritas[]" required>
                        <option class="prioritas0"  value="low">Low</option>
                        <option class="prioritas1"  value="normal">Normal</option>
                        <option class="prioritas2"  value="high">High</option>
                        <option class="prioritas3"  value="urgent">Urgent</option>
                    </select>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">SLA Ticket</label>
                        <input type="number" placeholder="SLA Ticket" autocomplete="on"

                            name="sla_ticket_time[]"

                            class="form-control form-control-sm sla_ticket_time" >
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Prablem / Request Detail</label>
                    <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="5"
                        name="problem[]" id=""></textarea>
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="text-dark">Choose file to upload (max. 10mb)</label>
                    <input type="file" class="form-control form-control-sm bg-white px-1" style="border-radius:0.25rem !important" rows="5"
                        name="files[]">
                </div>

                <div class="oke" style="text-align: right" >

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('supervisor.storetask') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="bu" value="{{ Auth::user()->departemen_corporate }}">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                            <h6 class="text-white text-capitalize ps-3">Create Tasks</h6>
                        </div>
                    </div>
                    <div class="card-body px-5 pb-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="input-group input-group-static mb-4">
                            <label for="Lokasi">Location</label>
                            <select class="form-control" name="lokasi" id="lokasi" required>
                                @foreach ($lokasi as $item)
                                    <option value="{{ $item->id }}">{{ $item->lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="Lokasi">Date</label>
                            <input type="text" class="form-control" autocomplete="off" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}"
                                aria-describedby="helpId" required>
                        </div>
                        <div class="form-check form-switch">
                            <input type="hidden" name="send_mail" value="false">
                            <input class="form-check-input" type="checkbox" name="send_mail">
                            <label class="form-check-label" for="OnlyAvailable">Send Mail Notifications</label>
                        </div>
                        <div class="mainform">
                            <div class="card bg-gray-700">
                                <div class="p-0 position-relative mt-n4 mx-3 z-index-2 border-radius-lg ps p-3 row">

                                    <h6
                                        class="col-10 col-sm-6 col-md-4 col-lg-4 col-xl-3 bg-gradient-primary shadow-primary border-radius-lg pt-1 pb-1 text-white text-capitalize ps-3">
                                        Problem / Request ( #Ticket 1 )</h6>
                                </div>
                                <div class="card-body bg-gray-500">
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Category</label>
                                        <select class="form-control form-control-sm select23" id="0" name="katagori[]" onchange="getCombo(this)" required>
                                            <option></option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Sub Category</label>
                                        <select class="form-control form-control-sm SUBSelect2" id="SubCategory0" name="subkategori[]" required>
                                            <option></option>
                                            @foreach ($subkategori as $item)
                                                <option class="Katagori{{ $item->katagori_id }}"  value="{{ $item->id }}">{{ $item->sub_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Agent</label>
                                        <select class="form-control form-control-sm agent agent_id select22" name="agent_id[]" required>
                                            <option></option>
                                            @foreach ($agents as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">User</label>
                                        <select class="form-control user user_id select88" name="user_id[]" >
                                            <option></option>
                                            @foreach ($user as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Priority</label>
                                        <select class="form-control form-control-sm Priority23" id="prioritas0" name="prioritas[]" required>
                                            <option class="prioritas0"  value="low">Low</option>
                                            <option class="prioritas1"  value="normal">Normal</option>
                                            <option class="prioritas2"  value="high">High</option>
                                            <option class="prioritas3"  value="urgent">Urgent</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">SLA Ticket  </label>
                                            <input type="number" placeholder="SLA Ticket" autocomplete="on"
                                                name="sla_ticket_time[]"  class="form-control  sla_ticket_time text-white" >
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Prablem / Request Detail</label>
                                        <textarea class="form-control form-control-sm bg-white" style="border-radius:0.25rem !important" rows="5"
                                            name="problem[]" id=""></textarea>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label class="text-dark">Choose file to upload (max. 10mb)</label>
                                        <input type="file" class="form-control form-control-sm bg-white px-1" style="border-radius:0.25rem !important" rows="5"
                                            name="files[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer px-0" style="text-align: right">
                            <button type="button" class="add btn btn-sm btn-success text-white"><i class="fa fa-plus"
                                    aria-hidden="true"></i> Add Problem</button>
                        </div>



                    </div>
                    <div class="card card-footer" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Send Ticket</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>


    <script>

        function getCombo(e) {
            console.log(111);
            $(document).ready(function () {


                var a= e.id;
                var b= e.value;


                var $example = $("#SubCategory"+a).select2();
                console.log("#SubCategory"+a);

                $example.val(null).trigger("change");
                $example.select2("destroy");

                $example.select2({
                    // //-^^^^^^^^--- update here
                    tags: true,
                    placeholder: "Select an Option",
                    width: '100%',
                    matcher: function(term, text,option){
                        if($(text.element).hasClass('Katagori'+b)){
                            return text;
                        }
                        return true;
                    }

                });
            });

        }

        $(document).ready(function() {
            $('#lokasi').select2();
            $('#tanggal').datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });

        function selectRefresh() {
            $('.mainform .select23').select2({
                //-^^^^^^^^--- update here
                tags: true,
                placeholder: "Select an Option",
                width: '100%'
            });
            $('.mainform .Priority23').select2({
                //-^^^^^^^^--- update here
                tags: true,
                placeholder: "Select an Option",
                width: '100%'
            });

            $('.mainform .select22').select2({
                //-^^^^^^^^--- update here
                tags: true,
                placeholder: "Select an Option",
                width: '100%'
            });

            $('.mainform .select88').select2({
                //-^^^^^^^^--- update here
                tags: true,
                placeholder: "Select an Option",
                width: '100%'
            });
        }

          function romoveku($id) {
            const element = document.getElementById('TicketKe'+$id);
            element.remove();
            }
        var index=1;
        $('button.add').click(function() {
            index++
           var a= $('.mainform').append($('.new-wrap').html());
           a.find('.card.bg-gray-700').last().attr('id', 'TicketKe'+index);
           a.find('.select23').last().attr('id', index);
           a.find('.Priority23').last().attr('id', "Priority"+index);
           a.find('.SUBSelect2').last().attr('id', 'SubCategory'+index);
           a.find('.ticket_nbr').last().append('( #Ticket '+index+' )');
           a.find('.oke').last().append('<a onclick="romoveku('+index+')" class=" btn btn-warning  text-white text-center  align-items-center justify-content-center"><i class="material-icons opacity-10">delete_sweep</i> Trash</a>');
            selectRefresh();
        });
        $(document).ready(function() {
            selectRefresh();
        });
    </script>
@endsection

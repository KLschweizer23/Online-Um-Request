@extends('layouts.myLayout')

@section('myContent')
<div class="container-fluid mt-2 py-3">
    <div class="container-fluid row shadow-lg p-0">
        <div class="col p-0" style="height: 35rem;">
            <div class="text-center pt-3 bg-um-inverted-active text-white container-fluid shadow" style="height:5rem;">
                <h1>List of Requests</h1>
            </div>
            <div class="container-fluid bg-um p-2 w-25 @role('Admin') float-left @else text-right float-right @endrole">
                @role('Admin')

                @else
                <button type="button" data-toggle="modal" data-target="#minusModal" class="btn-primary-um w-25">-</button>
                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn-primary-um w-25">+</button>
                @endrole
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            @role('Admin')
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            @endrole
                            <th scope="col">Requested Record</th>
                            <th scope="col">Date of Request</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date for Pickup</th>
                            @role('Admin')
                            <th scope="col">
                                Action
                            </th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @role('Admin')
                        @for($x = 0, $y = 0; $x < sizeof($user); $x++) @for($j=0; $j < sizeof($allData); $j++) <p style="display:none">{{$pos = sizeof($user[$x]) > 10 ? 'Student' : 'Alumni'}}</p>
                            @if($user[$x]['ID'] == $allData[$j]['_ID'] && $pos == $allData[$j]['POS'])
                            <tr>
                                <td>{{++$y}}</td>
                                <td>{{$user[$x]['ID']}}</td>
                                <td id="Name{{$y}}" data-id="{{$user[$x]['FIRSTNAME']}}">
                                    {{$user[$x]['FIRSTNAME']}}
                                </td>
                                <td id="Record{{$y}}" data-id="{{$allData[$j]['RECORD']}}">
                                    {{$allData[$j]['RECORD']}}
                                </td>
                                <td id="Date{{$y}}" data-id="{{$allData[$j]['DATE']}}">
                                    {{$allData[$j]['DATE']}}
                                </td>
                                <td id="Status{{$y}}" data-id="{{$allData[$j]['STATUS']}}">
                                    {{$allData[$j]['STATUS']}}
                                </td>
                                <td id="Pickup{{$y}}" data-id="{{$allData[$j]['PICKUP']}}">
                                    {{$allData[$j]['PICKUP']}}
                                </td>
                                <td>
                                    <button type="button" data-id="{{$allData[$j]['ID']}}" data-index="{{$y}}" data-toggle="modal" data-target="#actionModal" id="submitModal{{$y}}" class="btn-primary-um actBtn">
                                        Action
                                    </button>
                                </td>
                            <tr>
                                @endif
                                @endfor
                                @endfor
                                @else
                                @for($x = 0; $x < sizeof($data); $x++) <tr>
                                    <td> {{$x + 1}} </td>
                                    <td> {{$data[$x]['RECORD']}} </td>
                                    <td> {{$data[$x]['DATE']}} </td>
                                    <td> {{$data[$x]['STATUS']}} </td>
                                    <td> {{$data[$x]['PICKUP']}} </td>
                            </tr>
                            @endfor
                            @endrole
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@role('Admin')
<div class="modal fade p-0" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-um">
            <div class="modal-header bg-um-inverted">
                <h5 class="modal-title text-white" id="exampleModalLabel">Respond Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form3" method="POST">
                <div class="modal-body py-4 pb-0 px-0 bg-um text-left">
                    <div class="container-fluid row">
                        <h6 class="col">Unique ID:</h6>
                        <h6 class="col" id="modal_ID" name="MY_ID"></h6>
                    </div>
                    <div class="container-fluid row">
                        <h6 class="col">Requestor:</h6>
                        <h6 class="col" id="modal_name" name="NAME"></h6>
                    </div>
                    <div class="container-fluid row">
                        <h6 class="col">Requested Record:</h6>
                        <h6 class="col" id="modal_record" name="RECORD"></h6>
                    </div>
                    <div class="container-fluid row">
                        <h6 class="col">Date of Request:</h6>
                        <h6 class="col" id="modal_date" name="DATE"></h6>
                    </div>
                    <div class="container-fluid row">
                        <h6 class="col">Request Status:</h6>
                        <h6 class="col" id="modal_status" name="STATUS"></h6>
                    </div>
                    <div class="mt-3 mx-auto text-center justify-content-left form-group row container-fluid">
                        <label class="input w-100 mb-3">
                            <input class="input__field" id="pick" type="date" value="2021-05-30" name="PICKUP" placeholder=" " required />
                            <span class="input__label">Pickup Date</span>
                        </label>
                    </div>
                    <div class="container-fluid row mx-auto p-0">
                        <div class="col mx-auto text-center"><button type="submit" form="form3" name="Accept" class="btn btn-success w-75">Accept</button></div>
                        <div class="col mx-auto text-center"><button type="submit" form="form3" name="Claimed" class="btn btn-warning w-75">Claimed</button></div>
                        <div class="col mx-auto text-center"><button type="submit" form="form3" name="Deny" class="btn btn-danger w-75">Deny</button></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer bg-um-inverted">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-secondary" form="form3" name="minus">Delete</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    var buttons = document.querySelectorAll('.actBtn');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].onclick = function() {
            var index = this.getAttribute('data-index');
            var data = document.querySelector('#submitModal' + index);
            var id = $("#submitModal" + index).data('id');
            var name = $("#Name" + index).data('id');
            var record = $("#Record" + index).data('id');
            var date = $("#Date" + index).data('id');
            var status = $("#Status" + index).data('id');

            $("#modal_ID").html(id);
            $("#modal_name").html(name);
            $("#modal_record").html(record);
            $("#modal_date").html(date);
            $("#pick").value(date);
            $("#modal_status").html(status);
        };
    }
</script>
@else
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-um">
            <div class="modal-header bg-um-inverted">
                <h5 class="modal-title text-white" id="exampleModalLabel">Make Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form1" method="POST">
                <div class="modal-body text-center">
                    <label class="input w-100 my-3">
                        <select class="input__field" name="Record" placeholder=" " required>
                            <option>TOR</option>
                            <option>Honorable Dismissal</option>
                            <option>Diploma</option>
                            <option>etc...</option>
                        </select>
                        <span class="input__label">Records</span>
                    </label>
                </div>
            </form>
            <div class="modal-footer bg-um-inverted">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" form="form1" class="btn-primary-um-inverted" name="add">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="minusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-um">
            <div class="modal-header bg-um-inverted">
                <h5 class="modal-title text-white" id="exampleModalLabel">Delete Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form2" method="POST">
                <div class="modal-body text-center">
                    <label class="input w-100 my-3">
                        <select class="input__field" name="ID" placeholder=" " required>
                            @for($x=0; $x < sizeof($data); $x++) <option>No. {{$x + 1}}, Record is {{$data[$x]['RECORD']}} on {{$data[$x]['DATE']}} - Unique ID {{$data[$x]['ID']}}</option>
                            @endfor
                        </select>
                        <span class="input__label">List of Requests</span>
                    </label>
                </div>
            </form>
            <div class="modal-footer bg-um-inverted">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" form="form2" class="btn-primary-um-inverted" name="minus">Delete</button>
            </div>
        </div>
    </div>
</div>
@endrole
?>
@endsection
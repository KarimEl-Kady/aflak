
<!-- Updated Edit Button with Green Color -->
{{-- <a href="{{route('accept_orders',$id)}}" class="btn btn-sm btn-hover-bg-light btn-success m-0">
    <span class="svg-icon svg-icon-primary m-0 p-0 svg-icon-md">
        <!-- SVG Icon Code -->
    </span>
    {{__('messages.accept')}}
</a> --}}

<!-- Updated Delete Button with Red Color -->
<div style="cursor:pointer;" onclick="refuseOrder({{$id}})" class="btn btn-sm btn-hover-bg-light btn-danger mr-1">
    <span class="svg-icon svg-icon-danger m-0 p-0 svg-icon-md">
        <!-- SVG Icon Code -->
    </span>
    {{__('messages.refuse')}}
</div>

<div style="cursor:pointer;" onclick="acceptOrder({{$id}})" class="btn btn-sm btn-hover-bg-light btn-success m-0">
    <span class="svg-icon svg-icon-danger m-0 p-0 svg-icon-md">
        <!-- SVG Icon Code -->
    </span>
    {{__('messages.accept')}}
</div>

<script>
    function refuseOrder(id) {
        let user_id = id;
        var table = $('.dataTable').DataTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Swal.fire({
            title: "{{__('messages.areyousure')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Red color for "refuse"
            cancelButtonColor: '#6cbf73', // Green color for "accept"
            cancelButtonText: "{{__('messages.cancel')}}",
            confirmButtonText: "{{__('messages.yesrefuse')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: {
                        '_method': 'POST',
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id' : user_id
                    },
                    url: `{{route('refuse_orders')}}`,
                    dataType: "Json",
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire(
                                "{{__('messages.refused')}}",
                                "{{__('messages.donerefuse')}}",
                                'success'
                            )
                            table.ajax.reload();
                        }
                    }
                });
            }
        })
    }

    function acceptOrder(id) {
        let user_id = id;
        var table = $('.dataTable').DataTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Swal.fire({
            title: "{{__('messages.areyousure')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Red color for "refuse"
            cancelButtonColor: '#6cbf73', // Green color for "accept"
            cancelButtonText: "{{__('messages.cancel')}}",
            confirmButtonText: "{{__('messages.yesaccept')}}",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: {
                        '_method': 'POST',
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id' : user_id
                    },
                    url: `{{route('accept_orders')}}`,
                    dataType: "Json",
                    success: function (result) {
                        if (result.status == true) {
                            Swal.fire(
                                "{{__('messages.accepted')}}",
                                "{{__('messages.doneaccept')}}",
                                'success'
                            )
                            table.ajax.reload();
                        }
                    }
                });
            }
        })
    }

</script>



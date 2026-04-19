@extends('layouts.admin')
@section('content')
<section id="hoverable-rows">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Carts</h4>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%;">#</th>
                                    <th width="15%;">User Id</th>
                                    <th>Product Name</th>
                                    <th width="20%">Product Price</th>
                                    <th>Quentity</th>
                                    <th>Total Price</th>
                                    <th>Product Images</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function() {
        var dataTable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollCollapse: true,
            scrollX:false,
            scrollY: '60vh',
            ajax: {
               url: '{!! route('admin.carts.data') !!}',
                type: 'POST',
                data: function(d) {
                    d._token = $('meta[name=csrf-token]').attr('content');
                }
            },
           
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'user_id',orderable: false, searchable: false},
				{data: 'p_name',orderable: false, searchable: false},
                {data: 'base_price',orderable: false, searchable: false},
                {data: 'quantity',orderable: false, searchable: false},
                {data: 'total_price',orderable: false, searchable: false},
                {data: 'main_image',orderable: false, searchable: false},
                
            ],
            order: [],
        });
    });
    
</script>
@endsection

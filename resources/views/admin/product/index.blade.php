@extends('layouts.admin')
@section('content')
<section id="hoverable-rows">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4">
                            <a href="/admin/products/create"  class="btn btn-primary float-right"><i class="ft-plus-square mr-1"></i> New Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="datatable">
                            <thead>
                                <tr>
                                    <th width="5%;">#</th>
                                    <th width="15%;">Actions</th>
                                    <th>Name</th>
                                    <th width="20%">Price</th>
                                    <th>Main Image</th>
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
               url: '{!! route('admin.products.data') !!}',
                type: 'POST',
                data: function(d) {
                    d._token = $('meta[name=csrf-token]').attr('content');
                }
            },
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'action',name: 'products.id',orderable: false, searchable: false},
				{data: 'name',name: 'products.name',orderable: false, searchable: false},
                {data: 'price', name: 'products.price',orderable: false, searchable: false},
                {data: 'main_image', name: 'products.main_image',orderable: false, searchable: false},
                
            ],
            order: [],
        });
    });
</script>
@endsection

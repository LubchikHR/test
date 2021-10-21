<x-app-layout>
    @php ($title = 'Products list')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                    <div class="pull-right">
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-flat">Add Product</a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th style="width: 200px;">Description</th>
                                    <th style="width: 50px;">Price</th>
                                    <th style="width: 50px;">Qty</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>#{{ $product->id }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->desctription }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>
                                                <a href="#+" class="badge badge-info">+</a>
                                                <a href="#-" class="badge badge-info">-</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>

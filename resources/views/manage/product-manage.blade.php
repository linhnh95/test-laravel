@extends('master')

@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous">
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        new DataTable('#product-table', {
            order: [[1, 'asc']],
        });
    </script>
@endsection

@section('content')
    <div class="product-manage mt-4">
        <div class="row mb-4">
            <div class="add-new d-flex justify-content-end">
                <a class="btn btn-primary" href="/manage/create">Add new</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="product-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Images</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>
                            <a class="text-warning" href="/manage/">edit</a>
                            <a class="text-danger" href="manage/delete/">delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

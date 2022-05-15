@extends('layouts.control-panel')

@section('content')
    <div class="py-3 pe-4">
        <div class="mb-3">
            <button class="btn btn-success bg-gradient " type="submit">Create client</button>
        </div>
        <table class="table table-hover">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Organization</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>
                        <a href="">Data</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary bg-gradient btn-sm">View</button>
                        <button type="button" class="btn btn-warning bg-gradient btn-sm">Edit</button>
                        <button type="button" class="btn btn-danger bg-gradient btn-sm">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td>
                        <a href="">Data</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary bg-gradient btn-sm">View</button>
                        <button type="button" class="btn btn-warning bg-gradient btn-sm">Edit</button>
                        <button type="button" class="btn btn-danger bg-gradient btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

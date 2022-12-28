@extends('admin.admin')
@section('settingsContent')
    <center>
        <div class="containter text-center shadow mt-5" style="width:1000px">
            <div class="p-4">
                <input class="btn btn-secondary" value="Add User" type="submit"/>
            </div>
            <div class="p-4">
                <table class="table ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </center>


@endsection

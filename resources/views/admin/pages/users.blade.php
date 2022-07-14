@extends('admin.layouts.template')
@section('content')
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item ms-3" role="presentation" style="border:0; margin: 10px;">
            <button class="nav-link active" id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list"
                type="button" role="tab" aria-controls="pills-list" aria-selected="true">Customers</button>
        </li>
        <li class="nav-item ms-3" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-kasir-tab" data-bs-toggle="pill" data-bs-target="#pills-kasir" type="button"
                role="tab" aria-controls="pills-kasir" aria-selected="false">Kasir</button>
        </li>
        <li class="nav-item ms-3" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-admin-tab" data-bs-toggle="pill" data-bs-target="#pills-admin" type="button"
                role="tab" aria-controls="pills-admin" aria-selected="false">Admin</button>
        </li>
        <li class="nav-item" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-tambahadmin-tab" data-bs-toggle="pill" data-bs-target="#pills-tambahadmin"
                type="button" role="tab" aria-controls="pills-tambahadmin" aria-selected="false">Tambah Admin</button>
        </li>
        <li class="nav-item" role="presentation" style="margin: 10px;">
            <button class="nav-link" id="pills-tambahkasir-tab" data-bs-toggle="pill" data-bs-target="#pills-tambahkasir"
                type="button" role="tab" aria-controls="pills-tambahkasir" aria-selected="false">Tambah Kasir</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
                            {{-- <th scope="col">Region</th> --}}
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($users as $users)
                            <tr class="text-center">
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $users->first_name }}</td>
                                <td>{{ $users->last_name }}</td>
                                <td>{{ $users->username }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->phone_number }}</td>
                                <td>{{ $users->address }}</td>
                                {{-- <td>Purbalingga, Jawa Tengah</td> --}}
                                <td>
                                    <a href="/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade show" id="pills-kasir" role="tabpanel" aria-labelledby="pills-kasir-tab" tabindex="0">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td>Kasir 1</td>
                        <td>kasir1</td>
                        <td>
                            <a href="/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade show" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab"
            tabindex="0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($admin as $admin)
                            <tr class="text-center">
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->password }}</td>
                                <td>
                                    <a href="/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="/hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tambahadmin" role="tabpanel" aria-labelledby="pills-tambahadmin-tab"
            tabindex="0">
            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>

                {{-- level --}}
                <input type="hidden" name="level" value="admin">
                <div class="mb-5 row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-tambahkasir" role="tabpanel" aria-labelledby="pills-tambahkasir-tab"
            tabindex="0">
            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>

                {{-- level --}}
                <input type="hidden" name="level" value="admin">
                <div class="mb-5 row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger" style="margin-left: 5px;">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection

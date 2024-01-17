@extends('master')
@section('konten')
    <div class="container-fluid">
        <div class="text-end m-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahbiodata"> +
                Tambah produk Baru</button></div>
        @if (session('message'))
            <div class="alert alert-success m-3"> {{ session('message') }} </div>
        @endif
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>nis</th>
                <th>Nama</th>
                <th>alamat</th>
                <th>telp</th>
                <th>foto</th>
                <th>opsi</th>
            </tr>
            @foreach ($biodata as $p)
                <tr>
                    <td> {{ $p->nis }} </td>
                    <td> {{ $p->nama }} </td>
                    <td> {{ $p->alamat }} </td>
                    <td> {{ $p->telp }} </td>
                    <td> {{ $p->foto }}<br><img src="/assets/img/{{ $p->foto }}" alt="" width="80px"
                            height="100px"> </td>
                    <td>

                        <button class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#ModalUpdateproduk{{ $p->nis }}">Update</button>
                        |
                        <button class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#ModalDeletebiodata{{ $p->nis }}">Delete</button>
                    </td>
                </tr>

                <!-- Ini tampil form update produk -->
                <div class="modal fade" id="ModalUpdateproduk{{ $p->nis }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/biodata/storeupdate" method="post" class="form-floating">
                                    @csrf
                                    <div class="form-floating p-1">
                                        <input type="text" name="nis" id="nis" readonly class="form-control"
                                            value="{{ $p->nis }}">
                                        <label for="floatingInputValue">nis</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="nama" required="required" class="form-control"
                                            value="{{ $p->nama }}">
                                        <label for="floatingInputValue">Nama</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="alamat" required="required" class="form-control"
                                            value="{{ $p->alamat }}">
                                        <label for="floatingInputValue">alamat</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="telp" required="required" class="form-control"
                                            value="{{ $p->telp }}">
                                        <label for="floatingInputValue">telpon</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Updates</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini tampil form delete produk -->
                <div class="modal fade" id="ModalDeletebiodata{{ $p->nis }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus produk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/biodata/delete/{{ $p->nis }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $p->nama }}</b> ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

    <!-- Ini tampil form tambah produk -->
    <div class="modal fade" id="ModalTambahbiodata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/biodata/storeinput" method="post" class="form-floating"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating p-1">
                            <input type="text" name="nis" required="required" class="form-control">
                            <label for="floatingInputValue">nis</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="nama" required="required" class="form-control">
                            <label for="floatingInputValue">Nama</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="alamat" required="required" class="form-control">
                            <label for="floatingInputValue">alamat</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="telp" required="required" class="form-control">
                            <label for="floatingInputValue">telpon</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="file" name="foto" class="form-control">
                            <label for="floatingInputValue">Gambar</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

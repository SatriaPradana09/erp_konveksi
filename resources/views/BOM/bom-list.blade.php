@extends('index')
@section('title')
<span>BOM List</span>
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <div class="container-fluid mb-3">
            <a href="{{ url('/bom-input') }}" class="btn btn-primary">Create BOM</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Bom</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produksi</th>
                    <th scope="col">Tanggal Buat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($boms->count())
                    @foreach ($boms as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->kode_bom }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->total_harga }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#update{{ $item->kode_bom }}">
                                    Edit
                                </button>
                                <a href="{{ url('/bom/delete/' . $item->kode_bom) }}" class="btn btn-danger delete-confirm"
                                    role="button">Hapus</a>
                                <a href="{{ url('/bom/item_list/' . $item->kode_bom) }}" class="btn btn-success"
                                    role="button">Detail</a>
                                <!-- Modal -->
                                <div class="modal fade" id="update{{ $item->kode_bom }}" aria-labelledby="createLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="createLabel">Edit BOM</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form enctype="multipart/form-data"
                                                action="{{ url('/bom/bomUpdate') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">ID BOM</span>
                                                    <input type="text" class="form-control" id="kode_bom"
                                                        name="kode_bom" value="{{ $item->kode_bom }}" disabled>
                                                        
                                                </div>
                                                <br>
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">Pilih Produk
                                                    </span>
                                                    <select class="form-select" name="kode_produk">
                                                        <option selected value="{{ $item->nama_produk }}">
                                                            {{ $item->nama_produk }}
                                                        </option>
                                                        @if ($produk->count())
                                                            @foreach ($produk as $item)
                                                                <option value="{{ $item->kode_produk }}">
                                                                    {{ $item->nama_produk }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7"> No record found </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

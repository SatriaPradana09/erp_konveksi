@extends('index')
@section('title')
<span>Produk</span>
@endsection
@section('content')
    <div class="container-fluid mb-3">
        <a href="/produkinput" class="btn btn-primary">Masukan Produk / Bahan</a>
    </div>
    <div class="container-fluid mb-3">
        <h4>Table Produk</h4>
    </div>
    <table class="table table-bordered" id="myTable" name="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Banyak</th>
                <th scope="col">harga Satuan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($produk->count())
                @foreach ($produk as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ url('gambar/' . $product->gambar) }}" alt="No images"
                                style="width:150px;height:150px; border-radius: 10%;"></td>
                        <td>{{ $product->kode_produk }}</td>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->harga }}</td>
                        <td><a href="{{ url('/produkedit/' . $product->kode_produk) }}" class="btn btn-warning"
                                role="button">Edit</a>

                            <form action="/produkdelete/{{ $product->kode_produk }}" method="post">
                                @method('delete')
                                {{ csrf_field() }}
                                <button type="submit"
                                    onclick="return confirm('Yakin hapus Produk/Bahan '+'{{ $product->nama_produk }}?');"
                                    class="btn btn-danger delete-confirm my-1">
                                    <span class="text">Delete</span>
                                </button>
                            </form>
                            <!-- <a href="" class="btn btn-danger delete-confirm" role="button">Hapus</a> -->
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
    <div class="container-fluid mb-3">
        <h3>Table Bahan</h3>
    </div>
    <table class="table table-bordered" id="myTable" name="myTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Banyak</th>
                <th scope="col">harga Satuan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($bahan->count())
                @foreach ($bahan as $ingredient)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{ url('gambar/' . $ingredient->gambar) }}" alt="No images"
                                style="width:150px;height:150px; border-radius: 10%;"></td>
                        <td>{{ $ingredient->kode_produk }}</td>
                        <td>{{ $ingredient->nama_produk }}</td>
                        <td>{{ $ingredient->qty }}</td>
                        <td>{{ $ingredient->harga }}</td>
                        <td><a href="{{ url('/produkedit/' . $ingredient->kode_produk) }}" class="btn btn-warning"
                                role="button">Edit</a>
                            <form action="/produkdelete/{{ $ingredient->kode_produk }}" method="post">
                                @method('delete')
                                {{ csrf_field() }}
                                <button type="submit"
                                    onclick="return confirm('Yakin hapus Produk/Bahan '+'{{ $ingredient->nama_produk }}?');"
                                    class="btn btn-danger delete-confirm my-1">
                                    <span class="text">Delete</span>
                                </button>
                            </form>
                            <!-- <a href="" class="btn btn-danger delete-confirm" role="button">Hapus</a> -->
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
@endsection

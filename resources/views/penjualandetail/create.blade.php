@extends('layouts.default')
@section('content')
<!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Master Data</div>
        <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">

            <li class="breadcrumb-item active" aria-current="page">Entry Data</li>
            </ol>
        </nav>
        </div>

    </div>
    <!--end breadcrumb-->


    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">Add Penjualandetail</h6>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                <script>
                    // Timeout function to hide the alert after 3 seconds
                    setTimeout(function() {
                        document.getElementById('alert').style.display = 'none';
                    }, 2000);
                </script>
            @endif
            <form action="{{ route('penjualandetail.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

                    <div class="mb-3">
                        <label class="form-label">penjualan_id:&nbsp;{{ $id }}</label>
                        <input type="hidden" name="penjualan_id" class="form-control" placeholder="penjualan_id" value="{{ $id }}">
                        @error('penjualan_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" id="search" name="search" class="form-control" autocomplete="off">
                        <div id="suggestions" class="autocomplete-suggestions"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">kode_barang:</label>
                        <input type="text" name="kode_barang" id="kode_barang" class="form-control" autocomplete="off">
                        @error('kode_barang')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">nama_barang:</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" autocomplete="off">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">harga:</label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" value="0">
                        @error('harga')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity:</label>
                        <div class="col-1">
                            <input type="number" name="qty" id="qty" class="form-control" placeholder="qty" value="1" required min="1" onchange="calculateSubtotal()">
                        </div>
                        @error('qty')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">subtotal:</label>
                        <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="subtotal">
                        @error('subtotal')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function calculateSubtotal() {
        // Get the value of harga and qty
        let harga = parseFloat(document.getElementById('harga').value);
        let qty = parseInt(document.getElementById('qty').value);

        // Calculate subtotal
        let subtotal = harga * qty;

        // Display subtotal in the subtotal input field
        document.getElementById('subtotal').value = subtotal.toFixed(2); // Using toFixed to format to 2 decimal places
    }
    $(document).ready(function() {

        $('#search').on('input', function() {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: '{{ route('search.barang') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        var      suggestions = '';

                        data.forEach(function(brg) {
                            suggestions += '<div class="autocomplete-suggestion" ' +
                                        'data-kode_barang="' + brg.kode_barang + '" ' +
                                        'data-harga="' + brg.harga + '" ' +
                                        'data-nama_barang="' + brg.nama_barang + '">' +
                                        brg.kode_barang + ' - ' + brg.nama_barang + ' - ' + brg.harga
                                        '</div>';
                        });
                        $('#suggestions').html(suggestions);
                    }
                });
            } else {
                $('#suggestions').html('');
            }
        });

        $(document).on('click', '.autocomplete-suggestion', function() {
            var kode_barang = $(this).data('kode_barang');
            var nama_barang = $(this).data('nama_barang');
            var harga = $(this).data('harga');


            // Now nim and nama contain the respective values
            console.log('Kode Barang: ' + kode_barang);
            console.log('Nama Barang: ' + nama_barang);
            console.log('Harga Barang: ' + harga);

            // If you want to put the combined text in the input field
            $('#kode_barang').val(kode_barang);
            $('#nama_barang').val(nama_barang);
            $('#harga').val(harga);
            $('#subtotal').val(harga);

            // Clear the search field and suggestions
            $('#search').val('');
            $('#suggestions').html('');
        });
    });
</script>
@endpush

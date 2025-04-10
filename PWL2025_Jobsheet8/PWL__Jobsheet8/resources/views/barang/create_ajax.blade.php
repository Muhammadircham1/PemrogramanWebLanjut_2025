<form action="{{ url('/barang/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Barang ID</label>
                    <input value="" type="text" name="barang_id" id="barang_id" class="form-control" required>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input value="" type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                    <small id="error-nama_barang" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input value="" type="number" name="harga" id="harga" class="form-control" step="1" required>
                    <small id="error-harga" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input value="" type="number" name="stok" id="stok" class="form-control" step="1" required>
                    <small id="error-stok" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Created At</label>
                    <input value="" type="text" name="created_at" id="created_at" class="form-control" required>
                    <small id="error-created_at" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Updated At</label>
                    <input value="" type="text" name="updated_at" id="updated_at" class="form-control" required>
                    <small id="error-updated_at" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#form-tambah").validate({ 
            rules: {
                barang_id: { required: true, minlength: 3, maxlength: 20 }, 
                nama_barang: { required: true, minlength: 3, maxlength: 100 }, 
                harga: { required: true, digits: true, min: 1 },
                stok: { required: true, digits: true, min: 1 },
                created_at: { required: true },
                updated_at: { required: true }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action, 
                    type: form.method,
                    data: $(form).serialize(), 
                    success: function(response) {
                        if(response.status){
                            $('#myModal').modal('hide'); 
                            Swal.fire({
                                icon: 'success', 
                                title: 'Berhasil', 
                                text: response.message
                            });
                            dataBarang.ajax.reload(); 
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan', 
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error AJAX',
                            text: 'Terjadi kesalahan: ' + xhr.status + ' - ' + error
                        });
                        console.log('Error:', xhr.responseText);
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) { 
                error.addClass('invalid-feedback'); 
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

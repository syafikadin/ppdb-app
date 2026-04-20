<script>
    function setText(id, value) {
        document.getElementById(id).textContent = value && value !== 'null' ? value : '-';
    }

    document.querySelectorAll('.btn-show-siswa').forEach(button => {
        button.addEventListener('click', function() {
            setText('show_nama_siswa', this.dataset.nama_siswa);
            setText('show_nisn', this.dataset.nisn);
            setText('show_username', this.dataset.username);
            setText('show_email', this.dataset.email);
            setText('show_jenis_kelamin', this.dataset.jenis_kelamin === 'L' ? 'Laki-laki' : (this
                .dataset.jenis_kelamin === 'P' ? 'Perempuan' : '-'));
            setText('show_gelombang', this.dataset.gelombang);
            setText('show_tempat_lahir', this.dataset.tempat_lahir);
            setText('show_tanggal_lahir', this.dataset.tanggal_lahir);
            setText('show_nomor_wa', this.dataset.nomor_wa);
            setText('show_asal_sekolah', this.dataset.asal_sekolah);
            setText('show_status', this.dataset.status);
            setText('show_alamat', this.dataset.alamat);
            setText('show_nama_ayah', this.dataset.nama_ayah);
            setText('show_pekerjaan_ayah', this.dataset.pekerjaan_ayah);
            setText('show_penghasilan_ayah', this.dataset.penghasilan_ayah);
            setText('show_nama_ibu', this.dataset.nama_ibu);
            setText('show_pekerjaan_ibu', this.dataset.pekerjaan_ibu);
            setText('show_penghasilan_ibu', this.dataset.penghasilan_ibu);
            setText('show_nomor_wali', this.dataset.nomor_wali);
            setText('show_alamat_wali', this.dataset.alamat_wali);
            setText('show_catatan', this.dataset.catatan);
        });
    });

    document.querySelectorAll('.btn-edit-siswa').forEach(button => {
        button.addEventListener('click', function() {
            const updateUrl = "{{ route('data-siswa.update', ':id') }}".replace(':id', this.dataset.id);

            document.getElementById('formEditSiswa').action = updateUrl;
            document.getElementById('edit_nama_siswa').value = this.dataset.nama_siswa || '';
            document.getElementById('edit_nisn').value = this.dataset.nisn || '';
            document.getElementById('edit_username').value = this.dataset.username || '';
            document.getElementById('edit_email').value = this.dataset.email || '';
            document.getElementById('edit_gelombang_id').value = this.dataset.gelombang_id || '';
            document.getElementById('edit_jenis_kelamin').value = this.dataset.jenis_kelamin || '';
            document.getElementById('edit_tempat_lahir').value = this.dataset.tempat_lahir || '';
            document.getElementById('edit_tanggal_lahir').value = this.dataset.tanggal_lahir || '';
            document.getElementById('edit_nomor_wa').value = this.dataset.nomor_wa || '';
            document.getElementById('edit_asal_sekolah').value = this.dataset.asal_sekolah || '';
            document.getElementById('edit_status').value = this.dataset.status || '';
            document.getElementById('edit_alamat').value = this.dataset.alamat || '';
            document.getElementById('edit_nama_ayah').value = this.dataset.nama_ayah || '';
            document.getElementById('edit_pekerjaan_ayah').value = this.dataset.pekerjaan_ayah || '';
            document.getElementById('edit_penghasilan_ayah').value = this.dataset.penghasilan_ayah ||
            '';
            document.getElementById('edit_nama_ibu').value = this.dataset.nama_ibu || '';
            document.getElementById('edit_pekerjaan_ibu').value = this.dataset.pekerjaan_ibu || '';
            document.getElementById('edit_penghasilan_ibu').value = this.dataset.penghasilan_ibu || '';
            document.getElementById('edit_nomor_wali').value = this.dataset.nomor_wali || '';
            document.getElementById('edit_alamat_wali').value = this.dataset.alamat_wali || '';
            document.getElementById('edit_catatan').value = this.dataset.catatan || '';
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const oldModal = @json(old('_modal'));

        if (oldModal === 'create') {
            const modalCreate = new bootstrap.Modal(document.getElementById('modalCreateSiswa'));
            modalCreate.show();
        }
    });
</script>

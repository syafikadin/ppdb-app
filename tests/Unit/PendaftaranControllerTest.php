<?php

namespace Tests\Unit;

use App\Http\Controllers\PendaftaranController;
use App\Models\Siswa;
use PHPUnit\Framework\TestCase;

class PendaftaranControllerTest extends TestCase
{
    public function test_required_files_exclude_optional_surat_tidak_mampu(): void
    {
        $controller = new PendaftaranController();

        $this->assertSame(
            ['foto_3x4', 'akta', 'kk', 'ktp', 'skl_ijazah'],
            $controller->getRequiredFiles()
        );
    }

    public function test_missing_required_files_ignore_optional_surat_tidak_mampu(): void
    {
        $controller = new PendaftaranController();
        $siswa = new Siswa();
        $siswa->foto_3x4 = null;
        $siswa->akta = 'uploads/files/akta.pdf';
        $siswa->kk = 'uploads/files/kk.pdf';
        $siswa->ktp = 'uploads/files/ktp.pdf';
        $siswa->skl_ijazah = null;
        $siswa->surat_tidak_mampu = null;

        $this->assertSame(['foto_3x4', 'skl_ijazah'], $controller->getMissingRequiredFiles($siswa));
    }
}

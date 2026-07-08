<?php

namespace Tests\Feature;

use App\Models\Gelombang;
use App\Models\Pendaftar;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AdminSearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        if (!extension_loaded('pdo_sqlite')) {
            $this->markTestSkipped('PDO SQLite driver is required for this feature test.');
        }

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);

        DB::purge('sqlite');

        Schema::create('users', function ($table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->integer('role')->default(2);
            $table->timestamps();
        });

        Schema::create('gelombangs', function ($table) {
            $table->id();
            $table->string('nama_gelombang');
            $table->date('tanggal_ujian')->nullable();
            $table->string('status')->default('Open');
            $table->timestamps();
        });

        Schema::create('siswas', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gelombang_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nama_siswa');
            $table->string('nisn')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('status')->default('Belum Mendaftar');
            $table->timestamps();
        });

        Schema::create('pendaftars', function ($table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas')->cascadeOnDelete();
            $table->string('status_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    public function test_data_siswa_index_can_filter_results_by_search_term(): void
    {
        $userOne = User::create([
            'username' => 'arif',
            'email' => 'arif@example.com',
            'password' => bcrypt('secret123'),
            'role' => 2,
        ]);

        $userTwo = User::create([
            'username' => 'budi',
            'email' => 'budi@example.com',
            'password' => bcrypt('secret123'),
            'role' => 2,
        ]);

        $gelombang = Gelombang::create([
            'nama_gelombang' => 'Gelombang 1',
            'tanggal_ujian' => now()->toDateString(),
            'status' => 'Open',
        ]);

        Siswa::create([
            'user_id' => $userOne->id,
            'gelombang_id' => $gelombang->id,
            'nama_siswa' => 'Arif Prasetyo',
            'nisn' => '1111',
            'asal_sekolah' => 'SMA A',
            'status' => 'Belum Mendaftar',
        ]);

        Siswa::create([
            'user_id' => $userTwo->id,
            'gelombang_id' => $gelombang->id,
            'nama_siswa' => 'Budi Santoso',
            'nisn' => '2222',
            'asal_sekolah' => 'SMA B',
            'status' => 'Belum Mendaftar',
        ]);

        $this->withoutMiddleware();

        $response = $this->get(route('data-siswa.index', ['search' => 'Arif']));

        $response->assertOk();
        $response->assertSee('Arif Prasetyo');
        $response->assertDontSee('Budi Santoso');
    }

    public function test_data_pendaftar_index_can_filter_results_by_student_name(): void
    {
        $user = User::create([
            'username' => 'citra',
            'email' => 'citra@example.com',
            'password' => bcrypt('secret123'),
            'role' => 2,
        ]);

        $gelombang = Gelombang::create([
            'nama_gelombang' => 'Gelombang 2',
            'tanggal_ujian' => now()->toDateString(),
            'status' => 'Open',
        ]);

        $siswa = Siswa::create([
            'user_id' => $user->id,
            'gelombang_id' => $gelombang->id,
            'nama_siswa' => 'Citra Wulandari',
            'nisn' => '3333',
            'asal_sekolah' => 'SMA C',
            'status' => 'Belum Mendaftar',
        ]);

        Pendaftar::create([
            'id_siswa' => $siswa->id,
            'status_pendaftaran' => 'pending',
        ]);

        $this->withoutMiddleware();

        $response = $this->get(route('data-pendaftar.index', ['search' => 'Citra']));

        $response->assertOk();
        $response->assertSee('Citra Wulandari');
    }
}

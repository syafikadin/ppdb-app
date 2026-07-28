<?php

namespace Tests\Feature;

use App\Http\Controllers\DataSiswaController;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class DataSiswaValidationTest extends TestCase
{
    public function test_store_rejects_password_shorter_than_eight_and_nisn_longer_than_ten_characters()
    {
        $controller = new DataSiswaController();
        $validator = Validator::make([
            'password' => '1234567',
            'password_confirmation' => '1234567',
            'nisn' => '12345678901',
        ], [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'nisn' => $controller->getValidationRules()['nisn'],
        ], [
            'password.min' => 'Password minimal harus 8 karakter.',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter.',
            'nisn.digits_between' => 'NISN maksimal 10 digit.',
        ]);

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('password', $validator->errors()->messages());
        $this->assertContains('Password minimal harus 8 karakter.', $validator->errors()->messages()['password']);
        $this->assertArrayHasKey('nisn', $validator->errors()->messages());
        $this->assertContains('NISN maksimal 10 digit.', $validator->errors()->messages()['nisn']);
    }
}

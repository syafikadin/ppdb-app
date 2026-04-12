<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\TimelinePpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user = auth()->user();

        $gelombangAktif = Gelombang::with([
            'timelines' => function ($query) {
                $query->orderBy('urutan');
            }
        ])->where('status', 'Open')->latest()->first();

        if (!$gelombangAktif) {
            $gelombangAktif = Gelombang::with([
                'timelines' => function ($query) {
                    $query->orderBy('urutan');
                }
            ])->latest()->first();
        }

        $timelines = $gelombangAktif ? $gelombangAktif->timelines : collect();

        return view('pages.admin.index', compact('title', 'user', 'gelombangAktif', 'timelines'));
    }

    public function update(Request $request, $id)
    {
        $timeline = TimelinePpdb::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            ],
            [
                'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
                'tanggal_mulai.date' => 'Tanggal mulai tidak valid.',
                'tanggal_selesai.date' => 'Tanggal selesai tidak valid.',
                'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('admin.dashboard')
                ->withErrors($validator)
                ->withInput()
                ->with('edit_timeline_id', $timeline->id);
        }

        $timeline->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Tanggal timeline berhasil diperbarui.');
    }
}

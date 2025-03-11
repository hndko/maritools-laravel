<?php

namespace App\Http\Controllers\Backend\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Cek Game/Bank/E-Wallet',
            'pages' => 'Cek Game/Bank/E-Wallet',
        ];

        return view('backend.tools.cek.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'server' => 'nullable',
            'kode' => 'required',
        ]);

        try {
            // Debug data yang dikirim
            logger('Data dikirim ke API:', [
                'id' => $request->input('id'),
                'server' => $request->input('server'),
                'kode' => $request->input('kode'),
            ], JSON_UNESCAPED_UNICODE);

            // Pastikan data dikirim dalam format yang benar
            $response = Http::asForm()->post('https://yanjiestore.com/api/cek', [
                'id' => trim($request->input('id')), // Ambil nilai dari input form
                'server' => trim($request->input('server')), // Ambil nilai dari input form
                'kode' => trim($request->input('kode')), // Ambil nilai dari input form
            ]);

            $responseData = $response->json();

            // Jika response mengandung error
            if (isset($responseData['error'])) {
                return redirect()->back()->with('error', $responseData['error']);
            }

            // Jika berhasil, tampilkan response
            return redirect()->back()->with('success', 'Berhasil!')->with('response', $responseData);
        } catch (\Exception $e) {
            // Tangani error jika terjadi exception
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

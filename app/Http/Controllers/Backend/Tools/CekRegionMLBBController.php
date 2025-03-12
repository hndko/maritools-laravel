<?php

namespace App\Http\Controllers\Backend\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CekRegionMLBBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Cek Region MLBB',
            'pages' => 'Cek Region MLBB',
        ];

        return view('backend.tools.cek_region_mlbb.index', $data);
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
            'server' => 'required',
        ]);

        try {
            // Debug data yang dikirim
            logger('Data dikirim ke API:', [
                'id' => $request->input('id'),
                'server' => $request->input('server'),
            ], JSON_UNESCAPED_UNICODE);

            // Pastikan data dikirim dalam format yang benar
            $response = Http::asForm()->post('https://yanjiestore.com/api/cekregion', [
                'id' => trim($request->input('id')), // Ambil nilai dari input form
                'server' => trim($request->input('server')), // Ambil nilai dari input form
                'api_id' => trim("d88f2e72641c"),
                'api_key' => trim("81eb1ad81f1e0f6d2f39ad0f7a9df522a91a3232"),
                'signature' => trim("b6dbb909120f550214ed841ca6704bb9"),
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

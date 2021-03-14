<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use PDF;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapegawai = Pegawai::paginate(5);
        return view('pegawai/index', compact('datapegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapegawai = Pegawai::all();
        return view('pegawai/create', compact('datapegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'nama_pegawai'=> 'required',
                'nrp'=> 'required',
                'nip'=> 'required',
                'tempatlhr'=> 'required',
                'tgllahir'=> 'required',
                'alamat'=> 'required',
                'hp'=> 'required',
                'pangkat'=> 'required',
                'golongan'=> 'required',
                'jabatan'=> 'required',
                'bagian'=> 'required',
                'kanwil'=> 'required'
            ], [
                'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong',
                'nrp.required' => 'NRP tidak boleh kosong',
                'nip.required' => 'NIP tidak boleh kosong',
                'tempatlhr.required' => 'Tempat Lahir tidak boleh kosong',
                'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'hp.required' => 'No. HP tidak boleh kosong',
                'pangkat.required' => 'Pangkat tidak boleh kosong',
                'golongan.required' => 'Golongan tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'bagian.required' => 'Unit/Bagian tidak boleh kosong',
                'kanwil.required' => 'Kantor Wilayah tidak boleh kosong'
            ]);
        $pegawai = new Pegawai;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nrp = $request->nrp;
        $pegawai->nip = $request->nip;
        $pegawai->tempatlhr = $request->tempatlhr;
        $pegawai->tgllahir = $request->tgllahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->hp = $request->hp;
        $pegawai->pangkat = $request->pangkat;
        $pegawai->golongan = $request->golongan;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->bagian = $request->bagian;
        $pegawai->kanwil = $request->kanwil;
        $pegawai->save();


        // Pegawai::create($request->all());
        return redirect('datapegawai')->with('status', 'Data Pegawai Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $datapegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $datapegawai)
    {
        // $datapegawai = Pegawai::all();
        return view('pegawai/edit', compact('datapegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $datapegawai)
    {
        $request->validate([
                'nama_pegawai'=> 'required',
                'nrp'=> 'required',
                'nip'=> 'required',
                'tempatlhr'=> 'required',
                'tgllahir'=> 'required',
                'alamat'=> 'required',
                'hp'=> 'required',
                'pangkat'=> 'required',
                'golongan'=> 'required',
                'jabatan'=> 'required',
                'bagian'=> 'required',
                'kanwil'=> 'required'
            ], [
                'nama_pegawai.required' => 'Nama Pegawai tidak boleh kosong',
                'nrp.required' => 'NRP tidak boleh kosong',
                'nip.required' => 'NIP tidak boleh kosong',
                'tempatlhr.required' => 'Tempat Lahir tidak boleh kosong',
                'tgllahir.required' => 'Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'hp.required' => 'No. HP tidak boleh kosong',
                'pangkat.required' => 'Pangkat tidak boleh kosong',
                'golongan.required' => 'Golongan tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'bagian.required' => 'Unit/Bagian tidak boleh kosong',
                'kanwil.required' => 'Kantor Wilayah tidak boleh kosong'
            ]);

            Pegawai::where('id', $datapegawai->id)
        ->update([
                'nama_pegawai' => $request->nama_pegawai,
                'nrp' => $request->nrp,
                'nip' => $request->nip,
                'tempatlhr' => $request->tempatlhr,
                'tgllahir' => $request->tgllahir,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'pangkat' => $request->pangkat,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
                'bagian' => $request->bagian,
                'kanwil' => $request->kanwil,
        ]);

        return redirect('datapegawai')->with('status', 'Data Pegawai Berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $datapegawai)
    {
        //
    }

    public function cetakFilter($kanwil){
        $datapegawai = Pegawai::where('kanwil',[$kanwil])->get();

        if(is_null($datapegawai)){
            Session::flash("flash_message", [
                "warna" => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "Laporan Data Pegawai Filter.pdf";
            $pdf = PDF::loadview('pegawai/cetakfilter', compact('datapegawai'));
            $pdf->setPaper('F4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
}

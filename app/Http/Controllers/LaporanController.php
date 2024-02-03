<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\GudangModel;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');

        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
        }

        // Check if $awal and $akhir are defined
        if (!isset($awal)) {
            $awal = $tanggalAwal;
        }

        if (!isset($akhir)) {
            $akhir = $tanggalAkhir;
        }

        // Ambil data menggunakan metode getData
        $data = $this->getData($tanggalAwal, $tanggalAkhir);

        return view('pages.laporan.index', compact('tanggalAwal', 'tanggalAkhir', 'data', 'awal', 'akhir'));
    }


    public function getData($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;

        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $total_penjualan = TransaksiModel::where('created_at', 'LIKE', "%$tanggal%")->sum('bayar');
            $total_pengeluaran = GudangModel::where('created_at', 'LIKE', "%$tanggal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pengeluaran;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            $row['transaksi'] = format_uang($total_penjualan);
            $row['gudang'] = format_uang($total_pengeluaran);
            $row['pendapatan'] = format_uang($pendapatan);

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'transaksi' => '',
            'gudang' => 'Total Pendapatan',
            'pendapatan' => format_uang($total_pendapatan),
        ];

        return $data;
    }

    public function data($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);
        return datatables()->of($data)->make(true);
    }


    public function exportPDF($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);
        $pdf = PDF::loadView('pages.laporan.pdf', compact('awal', 'akhir', 'data'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan-pendapatan-' . date('Y-m-d-his') . '.pdf');
    }



}

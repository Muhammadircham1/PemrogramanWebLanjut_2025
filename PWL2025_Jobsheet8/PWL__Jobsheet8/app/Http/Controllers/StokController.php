<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar Stok yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stok';
        return view('stok.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list()
    {
        $stok = StokModel::with('barang')->select('stok_id', 'barang_id', 'jumlah', 'keterangan', 'created_at', 'updated_at');

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<button onclick="modalAction(\''.url('/stok/' . $stok->stok_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/stok/' . $stok->stok_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\''.url('/stok/' . $stok->stok_id . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $barang = BarangModel::select('barang_id', 'nama_barang')->get();
        return view('stok.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|integer|exists:m_barang,barang_id',
            'jumlah'    => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        StokModel::create($request->all());
        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    public function edit(string $id)
    {
        $stok = StokModel::find($id);
        $barang = BarangModel::select('barang_id', 'nama_barang')->get();
        return view('stok.edit', compact('stok', 'barang'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id' => 'required|integer|exists:m_barang,barang_id',
            'jumlah'    => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        StokModel::find($id)->update($request->all());
        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }

    public function destroy(string $id)
    {
        if (!StokModel::find($id)) {
            return redirect('/stok')->with('error', 'Data tidak ditemukan');
        }
        StokModel::destroy($id);
        return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
    }

    // AJAX Methods
    public function create_ajax()
    {
        $barang = BarangModel::select('barang_id', 'nama_barang')->get();
        return view('stok.create_ajax', compact('barang'));
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validator = Validator::make($request->all(), [
                'barang_id' => 'required|integer|exists:m_barang,barang_id',
                'jumlah'    => 'required|integer|min:1',
                'keterangan' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            StokModel::create($request->all());
            return response()->json(['status' => true, 'message' => 'Data stok berhasil disimpan']);
        }
        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $stok = StokModel::find($id);
        $barang = BarangModel::select('barang_id', 'nama_barang')->get();
        return view('stok.edit_ajax', compact('stok', 'barang'));
    }

    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validator = Validator::make($request->all(), [
                'barang_id' => 'required|integer|exists:m_barang,barang_id',
                'jumlah'    => 'required|integer|min:1',
                'keterangan' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $stok = StokModel::find($id);
            if ($stok) {
                $stok->update($request->all());
                return response()->json(['status' => true, 'message' => 'Data stok berhasil diupdate']);
            }
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $stok = StokModel::find($id);
        return view('stok.confirm_ajax', compact('stok'));
    }

    public function delete_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $stok = StokModel::find($id);
            if ($stok) {
                $stok->delete();
                return response()->json(['status' => true, 'message' => 'Data stok berhasil dihapus']);
            }
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
        }
        return redirect('/');
    }
    public function import()
    {
        return view('stok.import');
    }

    public function import_ajax(Request $request)
    {
        if($request->ajax() || $request->wantsJson()){
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB 
                'file_stok' => ['required', 'mimes:xlsx', 'max:1024']
            ];

            $validator = Validator::make($request->all(), $rules); 
            if($validator->fails()){
                return response()->json([ 
                    'status' => false,
                    'message' => 'Validasi Gagal', 
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_stok');                  // ambil file dari request

            $reader = IOFactory::createReader('Xlsx');              // load reader file excel
            $reader->setReadDataOnly(true);	                        // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath());     // load file excel
            $sheet = $spreadsheet->getActiveSheet();	            // ambil sheet yang aktif

            $data = $sheet->toArray(null, false, true, true);	    // ambil data excel

            $insert = [];
            if(count($data) > 1){                                   // jika data lebih dari 1 baris 
                foreach ($data as $baris => $value) {
                    if($baris > 1){                                 // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'barang_id' => $value['A'], 
                            'jumlah' => $value['B'], 
                            'keteramgan'  => $value['C'], 
                            'created_at'  => now(),
                        ];
                    }
                }

                if(count($insert) > 0){
                    // insert data ke database, jika data sudah ada, maka diabaikan 
                    StokModel::insertOrIgnore($insert);
                }

                return response()->json([ 
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            }else{
                return response()->json([ 
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }
}




<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LoanBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanBooks = LoanBook::orderByDesc('id')->with('user', 'book')->paginate(10);
        // menghitung banyak keterlambatan
        foreach ($loanBooks as $loan) {
            $today = Carbon::today();
            $returnDate = Carbon::parse($loan->return_date)->startOfDay();

            if ($today->lte($returnDate)) {
                $loan->status_waktu = 'masih dalam batas waktu';
            } else {
                $daysLate = $returnDate->diffInDays($today); // hanya selisih hari, tanpa minus, tanpa desimal
                $loan->status_waktu = "batas waktu pengembalian telah lebih $daysLate hari";
            }
        }
        // banyak keterlamabatan selesai
        return view('admins.LoanBooks.index', compact('loanBooks'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanBook $loanBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanBook $loanBook)
    {
        return view('admins.loanBooks.update_status', compact('loanBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanBook $loanBook)
    {
        $validated = $request->validate([
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

         DB::beginTransaction();

        try {
            $loanBook->update($validated);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal Update data: ' . $e->getMessage());
        }

        return redirect()->route('loan-books.index')->with('success', 'Status berhasil Diubah.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanBook $loanBook)
    {
        //
    }
}

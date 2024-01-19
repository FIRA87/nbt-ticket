<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Support\Facades\View;


class TicketController extends Controller
{

    public function index(Request $request)
    {
        return view('backend.tickets.index');
    }


    public function getData()
    {
        $data = Ticket::select(['id', 'i_o', 'corres', 'mt_msg', 'ref_msg', 'cur_mt', 'sum_mt', 'date_msg', 'pol'])->get();
        foreach ($data as $row) {
            $row->action = '<button type="button" class="btn btn-info btn-xs view" data-id="' . $row->id . '">View</button>';
        }
        return new JsonResponse(['data' => $data]);
    } // END getData

    public function getRecord($id)
    {
        $record = Ticket::find($id);
        return response()->json($record);
    } // END getRecord


    public function exportToPdf(Request $request)
    {
        try {
            $selectedIds = $request->json('selected_ids');

            if (!empty($selectedIds)) {
                $data = Ticket::whereIn('id', $selectedIds)->get();

                if ($data->isNotEmpty()) {
                    $filenames = [];

                    foreach ($data as $row) {
                        $pdf = \PDF::loadView('backend.tickets.pdf', compact('row'));

                        $filename = 'export-' . $row->id . '-at-' . Carbon::now()->format('Y-m-d') . '.pdf';
                        $pdf_content = $pdf->output();
                        Storage::disk('public')->put($filename, $pdf_content);
                        $filenames[] = Storage::disk('public')->url($filename);
                    }

                    return response()->json([
                        'success' => true,
                        'message' => 'Данные успешно экспортированы в PDF-файлы',
                        'filenames' => $filenames,
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Нет данных для экспорта',
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Не выбраны строки для экспорта',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при экспорте данных: ' . $e->getMessage(),
            ], 500);
        }
    } // END exportToPdf






}

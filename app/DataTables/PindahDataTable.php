<?php

namespace App\DataTables;

use App\Models\Pindah;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PindahDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('pindah.show', $model->id),
                    'url_edit' => route('pindah.edit', $model->id),
                    'url_destroy' => route('pindah.destroy', $model->id),
                ]);
            })
            ->editColumn('tanggal_pindah', function ($model) {
                return $model->tanggal_pindah->format('d-m-Y');
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(Pindah $model): QueryBuilder
    {
        return $model->latest()->with('penduduk:id,nik,name,jenis_kelamin,alamat')->select('tb_pindah.*')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pindah-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
            ->responsive(true);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center col-1'),
            Column::make('penduduk.nik')->title('NIK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('penduduk.name')->title('NAMA')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('penduduk.jenis_kelamin')->title('JK')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('tanggal_pindah')->title('TGL PINDAH')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('penduduk.alamat')->title('ALAMAT')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('tujuan_pindah')->title('TUJUAN')->addClass('text-left')->searchable(true)->orderable(true),
            Column::computed('action')
                ->title('AKSI')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center col-2'),
        ];
    }

    protected function filename(): string
    {
        return 'Pindah_' . date('YmdHis');
    }
}

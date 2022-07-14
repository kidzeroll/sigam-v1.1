<?php

namespace App\DataTables;

use App\Models\Pendatang;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendatangDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('pendatang.show', $model->id),
                    'url_edit' => route('pendatang.edit', $model->id),
                    'url_destroy' => route('pendatang.destroy', $model->id),
                ]);
            })
            ->editColumn('tanggal_datang', function ($model) {
                return $model->tanggal_datang->format('d-m-Y');
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(Pendatang $model): QueryBuilder
    {
        return $model->latest()->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendatang-table')
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
            Column::make('nik')->title('NIK')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('name')->title('NAMA')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('jenis_kelamin')->title('JK')->addClass('text-center')->searchable(false)->orderable(true),
            Column::make('tanggal_datang')->title('TGL DATANG')->addClass('text-center')->searchable(true)->orderable(true),
            Column::make('alamat_asal')->title('ALAMAT ASAL')->addClass('text-left')->searchable(true)->orderable(true),
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
        return 'Pendatang_' . date('YmdHis');
    }
}

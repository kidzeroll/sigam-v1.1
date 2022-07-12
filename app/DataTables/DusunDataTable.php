<?php

namespace App\DataTables;

use App\Models\Dusun;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DusunDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('dusun.show', $model->id),
                    'url_edit' => route('dusun.edit', $model->id),
                    'url_destroy' => route('dusun.destroy', $model->id),
                ]);
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function query(Dusun $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('dusun-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
            ->responsive(true)
            ->orderBy(1, 'asc');
    }

    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center col-1'),
            Column::make('name')->title('DUSUN')->addClass('text-left')->searchable(true)->orderable(true),
            Column::make('rt')->title('RT')->addClass('text-center col-1')->searchable(true)->orderable(true),
            Column::make('rw')->title('RW')->addClass('text-center col-1')->searchable(true)->orderable(true),
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
        return 'Dusun_' . date('YmdHis');
    }
}

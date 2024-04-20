<?php

namespace App\DataTables;

use App\Models\ReturnRent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReturnRentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'returns.action')
            ->addColumn('total_tarif', function ($row) {
                return "Rp." . number_format($row->total_tarif);
            })
            ->addColumn('durasi', function ($row) {
                return $row->durasi . ' Hari';
            })
            ->addColumn('tanggal_kembali', function ($row) {
                return $row->created_at;
            })
            ->addColumn('Status pengembalian', function ($row) {
                return view('returns.status', compact('row'));
            })
            ->addColumn('mobil', function ($row) {
                return $row->rent->car->merk . ' (' . $row->rent->car->model . ') ' . 'Rp.' . number_format($row->rent->car->tarif);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ReturnRent $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('returnrent-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('total_tarif'),
            Column::make('durasi'),
            Column::make('mobil'),
            Column::make('tanggal_kembali'),
            Column::make('Status pengembalian'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ReturnRent_' . date('YmdHis');
    }
}

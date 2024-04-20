<?php

namespace App\DataTables;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'rents.action')
            ->addColumn('mobil', function ($row) {
                return $row->car->merk . ' (' . $row->car->model . ') ' . 'Rp.' . number_format($row->car->tarif);
            })
            ->addColumn('status', function ($row) {
                return view('rents.status', compact('row'));
            })
            ->addColumn('no_sim', function ($row) {
                return $row->user->no_sim;
            })
            ->addColumn('nama', function ($row) {
                return $row->user->nama;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Rent $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('rent-table')
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
            Column::make('kode'),
            Column::make('nama'),
            Column::make('no_sim'),
            Column::make('mulai'),
            Column::make('status'),
            Column::make('selesai'),
            Column::computed('mobil'),
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
        return 'Rent_' . date('YmdHis');
    }
}

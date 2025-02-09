<?php

namespace App\DataTables;

use App\Models\BookTransaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReturnsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('book', function($model) {
                return $model->book->title;
            })
            ->addColumn('member', function($model) {
                return $model->member->name;
            })
            ->addColumn('action', function($model){ 
                return '
                    <div class="d-flex gap-2">
                        <a href="'.route('return.edit', $model->id).'" class="btn btn-6 btn-ghost-primary w-100">
                            Sunting
                        </a>
                    </div>
                ';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BookTransaction $model): QueryBuilder
    {
        return $model->where('status', 'return')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('returns-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->title('#')
                ->width(20),
            Column::make('date'),
            Column::make('condition'),
            Column::make('description'),
            Column::make('member')->title('Anggota'),
            Column::make('book')->title('Buku'),
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
        return 'Returns_' . date('YmdHis');
    }
}

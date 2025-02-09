<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
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
            ->addColumn('category', function($model) {
                return $model->category->name;
            })
            ->addColumn('author', function($model) {
                return $model->author->name;
            })
            ->addColumn('publisher', function($model) {
                return $model->publisher->name;
            })
            ->addColumn('location', function($model) {
                return $model->location->name;
            })
            ->addColumn('action', function($model){ 
                return '
                    <div class="d-flex gap-2">
                        <a href="'.route('book.detail', $model->id).'" class="btn btn-6 btn-ghost-primary w-100">
                            Detail
                        </a>
                    </div>
                ';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('books-table')
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
            Column::make('title'),
            Column::make('condition'),
            Column::make('category')->title('Category'),
            Column::make('author')->title('Pengarang'),
            Column::make('publisher')->title('Penerbit'),
            Column::make('location')->title('Lokasi'),
            Column::make('quantity'),
            Column::make('borrow_quantity')->title('Borrow Quantity'),
            Column::make('price'),
            Column::make('total_pages')->title('Total Page'),
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
        return 'Books_' . date('YmdHis');
    }
}

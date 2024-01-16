<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', function($query){
    //             $edit = "<a href='".route('admin.product.edit', $query->id)."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
    //             $delete = "<a href='". route('admin.product.destroy', $query->id) ."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash-alt'></i></a</form>";

    //             return $edit.$delete;
    //         })
    //         ->addColumn('status', function($query){
    //             $status = $query->status == 1 ? '<span class="badge badge-primary">Active</span>' : '<span class="badge badge-danger">InActive</span>';
                
    //             return $status;
    //         })->addColumn('show_at_home', function($query){

    //             $status = $query->show_at_home == 1 ? '<span class="badge badge-primary">Yes</span>' : '<span class="badge badge-danger">No</span>';

    //             return $status;
    //         })->addColumn('thumb_image', function($query) {
                
    //             return "<img src='". asset($query->image) ."' width='60'>";
    //         })->addColumn('price', function($query){

    //             return '$' . $query->price;
    //         })->addColumn('offer_price', function($query){

    //             return '$' . $query->offer_price;
    //         })
    //         ->rawColumns(['action', 'status', 'show_at_home', 'thumb_image', 'price', 'offer_price'])
    //         ->setRowId('id');
    // }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
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
            Column::make('id'),
            Column::make('name'),
            // Column::make('thumb_image'),
            // Column::make('short_description'),
            // Column::make('long_description'),
            // Column::make('price'),
            // Column::make('offer_price'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}

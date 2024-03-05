<?php

namespace App\DataTables\Admin;

// use App\Models\Offer;
use App\Models\Offer\Offer ;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OfferDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'offer.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Offer $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('offer-table')
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
             ["data" => "price" ,"title" => __('messages.price'),'orderable'=>false],
             ['data'=>'currency','title'=>__("messages.currency"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
             ['data'=>'expired_at','title'=>__("messages.expired_at"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
             ['data'=>'describtion','title'=>__("messages.describtion"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
             

        ];
    }

    /**
     * Get the filename for export.
     */

    protected function filename(): string
    {
        return 'Offer_' . date('YmdHis');
    }
}

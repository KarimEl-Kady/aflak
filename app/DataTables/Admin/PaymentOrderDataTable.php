<?php

namespace App\DataTables\Admin;

use App\Models\PaymentWay\PaymentOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'paymentorder.action')
            ->setRowId('id')
            ->editColumn("order_receipt_image",function($query){
                if($query->order_receipt_image_link){
                $image = $query->order_receipt_image_link;
                $status = '<img src="'.$image.'">';
                }else{
                    $status =__('messages.paymentorder doesnt have image');
                }
                return $status;
            })
            ->addColumn('action', 'admin_dashboard.payment_orders.action')
            ->rawColumns([
                'order_receipt_image',
                'action',
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PaymentOrder $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('paymentorder-table')
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
            ["data" => "order_receipt_image" ,"title" => __('messages.order_receipt_image'),'orderable'=>false],
            ["data" => "oreder_balance" ,"title" => __('messages.order_balance'),'orderable'=>false],

            // Column::make('created_at'),
            // Column::make('updated_at'),
            ['data'=>'action','title'=>__("messages.actions"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PaymentOrder_' . date('YmdHis');
    }
}

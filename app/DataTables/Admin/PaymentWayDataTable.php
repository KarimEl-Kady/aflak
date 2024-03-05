<?php

namespace App\DataTables\Admin;

use App\Models\PaymentWay\PaymentWay ;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentWayDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'paymentway.action')
            ->setRowId('id')
            ->editColumn("image",function($query){
                if($query->image_link){
                $image = $query->image_link;
                $status = '<img src="'.$image.'">';
                }else{
                    $status =__('messages.paymentway doesnt have image');
                }
                return $status;
            })->addColumn('type', function ($model) {
                if ($model->type == 0) {
                    return __('Gateway');
                } elseif ($model->type == 1) {
                    return __('Required Recepit');
                }
            })
            ->addColumn('action', 'admin_dashboard.payment_ways.action')
            ->rawColumns([
                'image',
                'action',
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PaymentWay $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('paymentway-table')
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

            // Column::make('id'),
            ["data" => "image" ,"title" => __('messages.image'),'orderable'=>false],
            ["data" => "title" ,"title" => __('messages.title'),'orderable'=>false],
            ["data" => "sub_title" ,"title" => __('messages.sub_title'),'orderable'=>false],
            ["data" => "type" ,"title" => __('messages.type'),'orderable'=>false],

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
        return 'PaymentWay_' . date('YmdHis');
    }
}

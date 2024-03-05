<?php

namespace App\DataTables\Admin;

use App\Models\Offer\Offer;
use App\Models\UserOffer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserOfferDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin_dashboard.user_offers.action')
            ->addColumn('status', function ($model) {
                if ($model->status == config('project_types.offer_status.pending')) {
                    return __('Pending');
                } elseif ($model->status == config('project_types.offer_status.accepted')) {
                    return __('Accepted');
                } elseif ($model->status == config('project_types.offer_status.refused')) {
                    return __('Refused');
                }
            })
            // ->addColumn('title', function ($model) {
            //     return $model->services()->first()->title ?? '';
            // })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */


    public function query(Offer $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id' , $this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('useroffer-table')
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
            ["data" => "status" ,"title" => __('messages.status'),'orderable'=>false],
            ["data" => "price" ,"title" => __('messages.price'),'orderable'=>false],
            ["data" => "currency" ,"title" => __('messages.currency'),'orderable'=>false],
            ["data" => "expired_at" ,"title" => __('messages.expired_at'),'orderable'=>false],
            // Column::make('remain_time'),


            // Column::make('created_at'),
            // Column::make('updated_at'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UserOffer_' . date('YmdHis');
    }
}

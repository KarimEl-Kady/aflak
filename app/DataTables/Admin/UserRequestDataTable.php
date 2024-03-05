<?php

namespace App\DataTables\Admin;

use App\Models\Request\Request;
use App\Models\Request\RequestRoom;
use App\Models\UserRequest;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserRequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin_dashboard.user_requests.action')
        ->addColumn('room_count', function ($model) {
            return $model->rooms()->first()->room_count ?? '';
        })
        ->addColumn('company_name', function ($model) {
            return $model->user()->first()->room_name ?? '';
        })
        ->addColumn('offer_sit', function ($model) {
            if ($model->offer_sit == 0) {
                return __('Not Offered');
            } elseif ($model->offer_sit == 1) {
                return __('Offered');
            } elseif ($model->offer_sit == 2) {
                return __('Cancelled');
            } elseif ($model->offer_sit == 3) {
            return __('Accepted');
        } else {
                return $model->offer_sit;
            }
        })

        ->setRowId('id')
        ->rawColumns([
            'room_name',
            'action',
        ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $model ): QueryBuilder
    {
        return $model->newQuery()->where('user_id' , $this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('userrequest-table')
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
            ["data" => "offer_sit" ,"title" => __('messages.offer_sit'),'orderable'=>false],
            ["data" => "checkin" ,"title" => __('messages.checkin'),'orderable'=>false],
            ["data" => "checkout" ,"title" => __('messages.checkout'),'orderable'=>false],
            ["data" => "hotel_name" ,"title" => __('messages.hotel_name'),'orderable'=>false],
            ["data" => "room_count" ,"title" => __('messages.room_count'),'orderable'=>false],


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
        return 'UserRequest_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables\Admin;

use App\Models\Request\Request;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin_dashboard.requests.action')
            ->addColumn('room_count', function ($model) {
                return $model->rooms()->first()->room_count ?? '';
            })
            ->addColumn('company_name', function ($model) {
                return $model->user()->first()->company_name ?? '';
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
            ->rawColumns([
                'room_count',
                'company_name',
                'action',
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Request $model): QueryBuilder
    {
        return $model->newQuery()->orderBy("id","desc");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->parameters([
            'dom' => 'Blfrtip',
            'order' => [0, 'desc'],
            'lengthMenu' => [
                [10,25,50,-1],[10,25,50,'all record']
            ],
       'buttons'      => ['export'],
   ]);
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
             ["data" => "hotel_name" ,"title" => __('messages.hotel_name'),'orderable'=>false],
             ['data'=>'hotel_address','title'=>__("messages.hotel_address"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
             ["data" => "company_name" ,"title" => __('messages.company_name'),'orderable'=>false],
             ["data" => "room_count" ,"title" => __('messages.room_count'),'orderable'=>false],
             ["data" => "offer_sit" ,"title" => __('messages.offer_sit'),'orderable'=>false],

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Request_' . date('YmdHis');
    }
}

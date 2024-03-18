<?php

namespace App\DataTables\Admin;

use App\Models\RequestSection\RequestSectionSetting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RequestSectionSettingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin_dashboard.request_section_settings.action')
        ->addColumn('type', function ($model) {
            if ($model->type == 1) {
                return __('messages.load');
            } elseif ($model->type == 2) {
                return __('messages.freight_type');
            }

    });
        // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RequestSectionSetting $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    // ->setTableId('requestsectionsetting-table')
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
            ['data' => 'title', 'title' => __('messages.title')  ,'orderable'=>false,'searchable'=>false],
            ['data' => 'type', 'title' => __("messages.type")],
            ['data' => 'action', 'title' => __("messages.actions"), 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RequestSectionSetting_' . date('YmdHis');
    }
}

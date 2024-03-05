<?php

namespace App\DataTables\Admin;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use League\CommonMark\Extension\Table\TableRow;
use League\CommonMark\Extension\Table\TableRowRenderer;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DetailDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin_dashboard.details.action')
            ->addColumn('status', function ($model) {
                if ($model->status == config('project_types.users_status.default')) {
                    return __('Not Upgrated');
                } elseif ($model->status == config('project_types.users_status.contract')) {
                    return __('Contracted');
                } elseif ($model->status == config('project_types.users_status.pending')) {
                    return __('Pending');
                } elseif ($model->status == config('project_types.users_status.accept')) {
                    return __('Upgrated');
                } elseif ($model->status == config('project_types.users_status.refuse')) {
                    return __('Refused');
                }
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('detail-table')
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
            ["data" => "name", "title" => __('messages.name'), 'orderable' => false],
            ["data" => "company_name", "title" => __('messages.company_name'), 'orderable' => false],
            ["data" => "company_address", "title" => __('messages.company_address'), 'orderable' => false],
            ["data" => "commercial_register_number", "title" => __('messages.commercial_register_number'), 'orderable' => false],
            ["data" => "status", "title" => __('messages.status'), 'orderable' => false],
            ["data" => "points", "title" => __('messages.points'), 'orderable' => false],
            ["data" => "balance", "title" => __('messages.balance'), 'orderable' => false],
            // Column::make('created_at'),
            // Column::make('updated_at'),

            ['data' => 'action', 'title' => __("messages.actions"), 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Detail_' . date('YmdHis');
    }
}

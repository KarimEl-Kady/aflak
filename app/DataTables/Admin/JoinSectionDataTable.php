<?php

namespace App\DataTables\Admin;

use App\Models\JoinSection\JoinSection;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JoinSectionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', 'admin_dashboard.join_sections.action')

            ->editColumn("image", function ($query) {
                if ($query->image_link) {
                    $image = $query->image_link;
                    // Add style attribute to resize the image
                    $status = '<img src="' . $image . '" style="max-width: 300px; max-height: 300px;">';
                } else {
                    $status = __('messages.join_section_doesnt_have_image');
                }
                return $status;
            })

            ->rawColumns([
                'action',
                'image'
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JoinSection $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('joinsection-table')
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
            ['data' => 'image', 'title' => __('messages.image')  , 'orderable'=>false,'searchable'=>false],
            ['data' => 'title', 'title' => __('messages.title')  ,'orderable'=>false,'searchable'=>false],
            ['data' => 'action', 'title' => __("messages.actions"), 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'JoinSection_' . date('YmdHis');
    }
}

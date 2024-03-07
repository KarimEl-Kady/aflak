<?php

namespace App\DataTables\Admin;

use App\Models\HomeSlider\HomeSliderimage;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HomeSliderImageDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn("image",function($query){
            if($query->image_link){
            $image = $query->image_link;
            $status = '<img src="'.$image.'">';
            }else{
                $status =__('messages.admin doesnt have image');
            }
            return $status;
        })
        ->addColumn('action', 'admin_dashboard.home_slider_images.action')
        ->rawColumns([
            'image',
            'action',
        ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(HomeSliderimage $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    // ->setTableId('homesliderimage-table')
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
            ["data" => "image" ,"title" => __('messages.image'),'searchable'=>false],

            ['data'=>'action','title'=>__("messages.actions"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
          ];
        
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'HomeSliderImage_' . date('YmdHis');
    }
}

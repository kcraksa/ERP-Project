<?php

namespace App\DataTables;

use App\Apps;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AppsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
                    ->addColumn('status', function($response) {
                        $data = json_decode($response);

                        if ($data->isActive == 1) {
                            $status = 'Active';
                        } else {
                            $status = 'Inactive';
                        }

                        return $status;
                    })
                    ->addColumn('created', function($response) {
                        $data = json_decode($response);

                        if (isset($data->created_at)){
                            if ($data->created_at != '' && $data->created_at != '0000-00-00 00:00:00') {
                                return date('d-m-Y H:i:s', strtotime($data->created_at));
                            } else {
                                return "N/A";
                            }
                        } else {
                            return "N/A";
                        }
                    })
                    ->addColumn('updated', function($response) {
                        $data = json_decode($response);

                        if (isset($data->updated_at)){
                            if ($data->updated_at != '' && $data->updated_at != '0000-00-00 00:00:00') {
                                return date('d-m-Y H:i:s', strtotime($data->updated_at));
                            } else {
                                return "N/A";
                            }
                        } else {
                            return "N/A";
                        }
                    })
                    ->addColumn('action', 'apps.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Apps $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns([
                        'id'      => ['title' => 'ID'],
                        'appName' => ['title' => 'Application Name'],
                        'status'  => ['title' => 'Status'],
                        'created' => ['title' => 'Created At'],
                        'updated' => ['title' => 'Updated At']
                    ])
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'dom'     => 'Bfrtip',
                        'order'   => [[0, 'desc']],
                        'buttons' => [
                            'create', 'print', 'excel', 'pdf', 'reload'
                        ],
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'appName',
            'isActive',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'apps_' . time();
    }
}

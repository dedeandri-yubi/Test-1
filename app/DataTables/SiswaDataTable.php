<?php

namespace App\DataTables;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SiswaDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'siswa.action')
            ->setRowId('id');
    }

    public function query(Siswa $model): QueryBuilder
    {
        return $model->newQuery();
    }
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('siswa-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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

    public function getColumns(): array
    {
        return [
            Column::make('Nama'),
            Column::make('Nis'),
            Column::make('Kelas'),
            Column::make('Jurusan'),
            Column::make('Jenis Kelamin'),
            Column::make('Agama'),
            Column::make('Alamat'),
        ];
    }

    protected function filename(): string
    {
        return 'Siswa_' . date('YmdHis');
    }
}

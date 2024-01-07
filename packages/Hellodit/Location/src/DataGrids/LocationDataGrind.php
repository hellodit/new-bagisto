<?php

namespace Hellodit\Location\DataGrids;


use Webkul\DataGrid\DataGrid;

class LocationDataGrind extends DataGrid
{

    public function prepareQueryBuilder()
    {
        return \DB::table('locations')->select('*');
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index' => 'image',
            'label' => trans('admin::app.catalog.products.index.datagrid.image'),
            'type' => 'image',
            'searchable' => false,
            'filterable' => false,
            'sortable' => false,
            'closure' => function ($row) {
                if ($row->image) {
                    return '<img src="' . asset("storage/partner-image/{$row->image}") . '" alt="Image" height="50px" width="50px">';
                }

                return  '<img src="https://placehold.co/50x50/png">';
            },
        ]);


        $this->addColumn([
            'index' => 'name',
            'label' => 'Location name',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
        $this->addColumn([
            'index' => 'status',
            'label' => 'status',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
    }


    public function prepareActions()
    {
        $this->addAction([
            'icon' => 'icon-edit',
            'title' => 'Edit',
            'method' => 'GET',
            'url' => function ($row) {
                return route('admin.location.edit', $row->id);
            },
        ]);


        $this->addAction([
            'icon' => 'icon-view',
            'title' => 'Detail',
            'method' => 'GET',
            'url' => function ($row) {
                return route('shop.location.detail', $row->slug);
            },
        ]);

        $this->addAction([
            'icon' => 'icon-delete',
            'title' => trans('admin::app.marketing.promotions.catalog-rules.index.datagrid.delete'),
            'method' => 'DELETE',
            'url' => function ($row) {
                return route('admin.location.destroy', $row->id);
            },
        ]);


    }

}

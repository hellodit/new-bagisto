<?php

namespace Webkul\Partner\DataGrids;

use Webkul\DataGrid\DataGrid;
use Illuminate\Support\Facades\DB;
use Webkul\Partner\Models\Partner;

class PartnerDataGrid extends DataGrid
{

    public function prepareQueryBuilder()
    {
        return DB::table('partners')->select('*');
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
            'index' => 'title',
            'label' => 'Partner title',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);

        $this->addColumn([
            'index' => 'company',
            'label' => 'Company name',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
        $this->addColumn([
            'index' => 'email',
            'label' => 'Email',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
        $this->addColumn([
            'index' => 'website',
            'label' => 'Website',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
    }


    public function prepareActions()
    {
//        $this->addAction([
//            'icon' => 'icon-edit',
//            'title' => 'Edit',
//            'method' => 'GET',
//            'url' => function ($row) {
//                return route('admin.partner.edit', $row->id);
//            },
//        ]);



        $this->addAction([
            'icon' => 'icon-view',
            'title' => 'Detail',
            'method' => 'GET',
            'url' => function ($row) {
                return route('shop.partner.detail', $row->id);
            },
        ]);

        $this->addAction([
            'icon' => 'icon-delete',
            'title' => trans('admin::app.marketing.promotions.catalog-rules.index.datagrid.delete'),
            'method' => 'DELETE',
            'url' => function ($row) {
                return route('admin.partner.destroy', $row->id);
            },
        ]);


    }
}

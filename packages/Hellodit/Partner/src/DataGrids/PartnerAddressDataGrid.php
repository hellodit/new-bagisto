<?php

namespace Hellodit\Partner\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class PartnerAddressDataGrid extends DataGrid {

    public function prepareQueryBuilder()
    {
        return DB::table('partner_addresses')
            ->select('*')
            ->orderBy('partner_addresses.created_at');
    }

    public function prepareColumns()
    {
        $this->addColumn([
            'index' => 'company',
            'label' => 'Company',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
        $this->addColumn([
            'index' => 'company_id',
            'label' => 'Company ID',
            'type' => 'string',
            'searchable' => false,
            'sortable' => true,
            'filterable' => true
        ]);
    }

    public function prepareActions()
    {
//        $this->addAction([
//            'icon' => 'icon-gear',
//            'title' => 'Add Address',
//            'method' => 'GET',
//            'url' => function ($row) {
//                return route('admin.partner_address.edit', $row->id);
//            },
//        ]);

//
//        $this->addAction([
//            'icon' => 'icon-edit',
//            'title' => 'Edit',
//            'method' => 'GET',
//            'url' => function ($row) {
//                return route('admin.partner_address.edit', $row->id);
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
                return route('admin.partner_address.destroy', $row->id);
            },
        ]);

    }
}

<?php

namespace Webkul\Partner\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Partner\Models\Partner;

class PartnerRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Partner::class;
    }

    public function create(array $data)
    {
        $attribute = $this->model->create($data);

        return $attribute;
    }

    public function update(array $attributes, $id)
    {
        $attribute = $this->find($id);

        $attribute->update($attributes);

        return $attribute;
    }

    public function delete($id)
    {
        $partner = $this->where('id', $id)->firstOrFail();
        return $partner->delete();
    }


    public function getAll(array $params = [])
    {
        $queryBuilder = $this->query();

        foreach ($params as $key => $value) {
            switch ($key) {
                case 'name':
                    $queryBuilder->where('partner.company', 'like', '%' . urldecode($value) . '%');
                    break;
            }
        }

        return $queryBuilder->paginate($params['limit'] ?? 10);
    }
}

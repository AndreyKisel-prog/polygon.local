<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepository
{
    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT(id,' . 'title) AS id_title',
        ]);
//        $result[] = $this->startConditions()->all();
//
//        $result[] = $this
//            ->startConditions()
//            ->select('blog_categories.*', DB::raw('CONCAT (id,". ",title) AS id_title'))
//            ->toBase()
//            ->get();

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);
        return $result;
    }

}

<?php

namespace App\Contracts;

/**
 * Interface ArticleSubCategoryContract
 * @package App\Contracts
 */
interface ArticleSubCategoryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSubCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSubCategoryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSubCategory(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSubCategory(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSubCategory($id);

     /**
     * @param $id
     * @return mixed
     */
    public function detailsSubCategory($id);

    /**
     * @param $id
     * @return mixed
     */
    public function listCategory();


    public function updatesubCategoryStatus(array $params);
    public function getSearchSubcategory(string $term);
}
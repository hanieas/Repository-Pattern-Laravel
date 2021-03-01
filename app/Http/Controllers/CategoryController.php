<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->categoryRepository->all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function store(Request $request)
    {
        $this->categoryRepository->create($request->only($this->categoryRepository->getFillable()));
        return self::index();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
    {
        return $this->categoryRepository->find($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function update($id,Request $request)
    {
        $this->categoryRepository->update($id, $request->only($this->categoryRepository->getFillable()));
        return self::show($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        return self::index();
    }
}

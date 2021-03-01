<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(isset($_GET['has_selling_stock']) && $_GET['has_selling_stock'] == 1)
        {
            $records = $this->productRepository->getExists();
        }
        else{
            $records = $this->productRepository->all();
        }
        return response()->json($records);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->productRepository->create($request->only($this->productRepository->getFillable()));
        return self::index();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->productRepository->destroy($id);
        return self::index();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id,Request  $request)
    {
        $this->productRepository->update($id, $request->only($this->productRepository->getFillable()));
        return self::show($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->productRepository->find($id);
    }
}

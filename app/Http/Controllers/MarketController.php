<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\MarketRepository;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * @var MarketRepository
     */
    private $marketRepository;

    /**
     * MarketController constructor.
     * @param MarketRepository $marketRepository
     */
    public function __construct(MarketRepository $marketRepository)
    {
        $this->marketRepository = $marketRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(isset($_GET['has_product']) && $_GET['has_product'] == 1)
        {
            $records = $this->marketRepository->hasProduct();
        }
        else{
            $records = $this->marketRepository->all();
        }
        return response()->json($records);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $record = $this->marketRepository->find($id);
        return response()->json($record);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->marketRepository->create($request->only($this->marketRepository->getFillable()));
        return self::index();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id,Request $request)
    {
        $this->marketRepository->update($id, $request->only($this->marketRepository->getFillable()));
        return self::show($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->marketRepository->destroy($id);
        return self::index();
    }


}

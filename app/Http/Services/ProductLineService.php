<?php


namespace App\Http\Services;


use App\Http\Repositories\ProductLineRepository;
use App\Models\ProductLine;

class ProductLineService extends BaseService
{
  protected $productLineRepo;

  public function __construct(ProductLineRepository $productLineRepo)
  {
      return $this->productLineRepo = $productLineRepo;
  }
  function getAll()
  {
      return $this->productLineRepo->getAll();
  }

  function store($request)
  {
      $productline = new ProductLine();
      $productline->fill($request->all());

      if ($request->hasFile('img')){
          $path = $this->updateLoadFile($request, 'img', 'productline-image');
          $productline->img = $path;
      }
      $this->productLineRepo->store($productline);
  }

    function getById($id)
    {
        return $this->productLineRepo->findById($id);
    }


    function update($request, $id)
    {
        $productline = $this->productLineRepo->findById($id);
        if ($request->hasFile('img')){
            $path = $this->updateLoadFile($request, 'img', 'productline-image');

            $productline->image_path = $path;
        }
        $productline->fill($request->all());
        $this->productLineRepo->store($productline);
    }

}

<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Response as ResponseFacade;

class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return \App\Core\Controllers\ApiController response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    private function respond($data, $headers = [])
    {
        return ResponseFacade::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithSuccess($data = null)
    {
        return $this->respond([
            'data' => $data
        ]);
    }

    public function respondWithNotFound()
    {
       $this->setStatusCode(404);
        return $this->respond([
            'errors' => [
                'status' => 'error',
                'message' => 'not found',
            ]
        ]);
    }

    public function respondWithError($message = 'error')
    {
        return $this->respond([
            'errors' => [
                'status' => 'error',
                'message' => $message,
            ]
        ]);
    }

    /**
     * @param Paginator $paginate
     * @param $data
     * @return mixed
     */
    protected function respondWithPagination(Paginator $paginate, $data)
    {
        return $this->respond([
            'data' =>  [
                'items' => $data,
                'per_page' => $paginate->perPage(),
                'current_page' => $paginate->currentPage(),
                'total' => $paginate->total(),
                'last_page' => $paginate->lastPage(),
                'next_url' => $paginate->nextPageUrl()
            ]
        ]);
    }

}

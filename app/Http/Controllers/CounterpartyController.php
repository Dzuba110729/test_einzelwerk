<?php

namespace App\Http\Controllers;

use App\Http\Requests\CounterpartyRequest;
use App\Models\Counterparty;
use App\Services\DadataService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CounterpartyController extends Controller
{
    protected DadataService $dadataService;

    public function __construct(DadataService $dadataService)
    {
        $this->dadataService = $dadataService;
    }

    public function store(CounterpartyRequest $request): JsonResponse
    {
        $user = $request->user();
        $inn = $request->validated()['inn'];

        // Получаем данные из DaData
        $company = $this->dadataService->getCompanyByInn($inn);

        if (!$company) {
            return response()->json(['error' => 'Контрагент не найден'], 404);
        }

        // Создаем контрагента
        $counterparty = $user->counterparties()->create([
            'inn' => $inn,
            'name' => $company['data']['name']['short_with_opf'],
            'ogrn' => $company['data']['ogrn'],
            'address' => $company['data']['address']['unrestricted_value'],
        ]);

        return response()->json($counterparty, 201);
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user()->counterparties);
    }
}

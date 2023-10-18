<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class CustomerController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\Customer::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'admin.customer.index',
            table: \App\Tables\CustomerTable::class
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \App\Models\Customer::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.customer.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \App\Models\Customer::class,
            validation: [
                            'name' => 'required|max:255|string',
            'status' => 'required|max:255|string'
            ],
            message: __('Customer updated successfully'),
            redirect: 'admin.customer.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\Customer $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\Customer $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.customer.show',
        );
    }

    /**
     * @param \App\Models\Customer $model
     * @return View
     */
    public function edit(\App\Models\Customer $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.customer.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\Customer $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\Customer $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'name' => 'sometimes|max:255|string',
            'status' => 'sometimes|max:255|string'
            ],
            message: __('Customer updated successfully'),
            redirect: 'admin.customer.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\Customer $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\Customer $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Customer deleted successfully'),
            redirect: 'admin.customer.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}

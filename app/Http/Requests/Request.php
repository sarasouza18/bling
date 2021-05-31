<?php

namespace App\Http\Requests;

use App\Support\Collection;
use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * @return Collection
     */
    public function data()
    {
        return collect_all($this->validated());
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }

    /**
     * @param array|mixed|null $keys
     *
     * @return array
     */
    public function all($keys = null)
    {
        return array_merge_recursive(parent::all(), ['parameters' => $this->parameters()]);
    }
}
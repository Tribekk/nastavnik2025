<?php

namespace App\Admin\Requests;

use App\Kladr\Rules\RequiredIfFilled;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExternalOrgunitRequest extends FormRequest
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
    public function rules()
    {
        return [
            'logo' => ['nullable', 'image', 'mimes:jpeg,bmp,png,gif,jpg', 'max:500'],
            'title' => ['required', 'string', 'max:191'],
            'short_title' => ['nullable', 'string', 'max:191'],
            'legal_form_id' => ['required', 'exists:legal_forms,id'],
            'parent_id' => ['nullable', 'exists:external_orgunits,id'],
            'activity_kind_id' => ['required', 'exists:user_profiles,id'],
            'description' => ['nullable', 'string', 'max:45000'],

            'legal_address.region' => [new RequiredIfFilled(request('legal_address'), 'region'), 'exists:kladr,code'],
            'legal_address.city' => [new RequiredIfFilled(request('legal_address'), 'city'), 'exists:kladr,code'],
            'legal_address.street' => [new RequiredIfFilled(request('legal_address'), 'street'), 'exists:street,code'],
            'legal_address.house' => [new RequiredIfFilled(request('legal_address'), 'house'), 'string', 'max:32'],

            'fact_address.region' => [new RequiredIfFilled(request('fact_address'), 'region'), 'exists:kladr,code'],
            'fact_address.city' => [new RequiredIfFilled(request('fact_address'), 'city'), 'exists:kladr,code'],
            'fact_address.street' => [new RequiredIfFilled(request('fact_address'), 'street'), 'exists:street,code'],
            'fact_address.house' => [new RequiredIfFilled(request('fact_address'), 'house'), 'string', 'max:32'],
        ];
    }

    public function attributes()
    {
        return [
            'logo' => '«логотип»',
            'parent_id' => '«головная организация»',
            'legal_form_id' => '«организационно-правовая форма»',
            'activity_kind_id' => '«направление деятельности»',
            'description' => '«описание»',

            'legal_address.region' => '«юридический адрес, регион»',
            'legal_address.city' => '«юридический адрес, город»',
            'legal_address.street' => '«юридический адрес, улица»',
            'legal_address.house' => '«юридический адрес, дом»',

            'fact_address.region' => '«юридический адрес, регион»',
            'fact_address.city' => '«юридический адрес, город»',
            'fact_address.street' => '«юридический адрес, улица»',
            'fact_address.house' => '«юридический адрес, дом»',
        ];
    }
}

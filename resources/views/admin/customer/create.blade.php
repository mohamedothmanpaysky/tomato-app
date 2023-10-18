<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Customer')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.customer.store')}}" method="post">

        <x-splade-input :label="__('Name')" name="name" type="text"  :placeholder="__('Name')" />

        <x-splade-select :label="__('Status')" name="status" type="text"  :placeholder="__('Status')" >
            <option value="activate">activate</option>
            <option value="Deactivate">Deactivate</option>
        </x-splade-select>
        
        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.customer.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>

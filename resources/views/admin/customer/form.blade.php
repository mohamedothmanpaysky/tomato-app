<x-splade-modal class="font-main">
    @if(isset($model))
        <h1 class="text-2xl font-bold mb-4">{{__('Edit Customer')}} #{{$model->id}}</h1>
        @else
            <h1 class="text-2xl font-bold mb-4">{{__('Create Customer')}} </h1>
    @endif

       <x-splade-form :for="$form" />

</x-splade-modal>

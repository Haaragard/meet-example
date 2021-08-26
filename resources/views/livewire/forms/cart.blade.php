<div class="h-full w-full rounded-md text-gray-900">
    <div class="mx-auto my-5">
        <h1 class="text-center text-4xl">{{ __('Cart') }}</h1>
    </div>

    <hr />

    <div class="py-10 px-5">
        <div class="p-4 flex">
            <h2 class="text-3xl">
                {{ __('Products') }}
            </h2>
        </div>
        <div class="flex px-3 py-4 justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <thead class="border-b">
                    <th class="text-left p-3 px-5">
                        {{ __('Products') }}
                    </th>
                    <th class="text-left p-3 px-5">
                        {{ __('Quantity') }}
                    </th>
                    <th class="text-left p-3 px-5">
                        {{ __('Value') }}
                    </th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse ($items as $itemKey => $item)
                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">
                            <div class="flex flex-col">
                                <select name="" id="" class="form" wire:model="items.{{ $itemKey }}.product_id" wire:change="changeValue({{ $itemKey }})">
                                    <option value="">{{ __('Select a product') }}</option>
                                    @forelse ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </td>
                        <td class="p-3 px-5">
                            <input
                                type="number"
                                min="0"
                                class="bg-white text-center"
                                wire:model="items.{{ $itemKey }}.quantity"
                                wire:change="changeValue({{ $itemKey }})" />
                        </td>
                        <td class="p-3 px-5">
                            <input
                                type="number"
                                class="bg-white text-center"
                                wire:model="items.{{ $itemKey }}.value"
                                disabled />
                        </td>
                        <td class="p-3 px-5">
                            <div class="flex justify-end">
                                @if ($items->count() > 1)
                                <button
                                    type="button"
                                    class="py-1 px-2 m-auto h-8 text-sm text-white bg-red-500 hover:bg-red-700 rounded-lg focus:outline-none focus:shadow-outline"
                                    wire:click="removeItem({{ $itemKey }})">
                                    <span class="material-icons-outlined w-full">
                                        remove
                                    </span>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="p-3 px-5">
                            <div class="flex items-center justify-center">
                                <button
                                    type="button"
                                    class="py-1 px-1 m-auto h-8 text-sm text-white bg-blue-500 hover:bg-blue-700 rounded-full focus:outline-none focus:shadow-outline"
                                    wire:click="addItem" >
                                    <span class="material-icons-outlined">
                                        add
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-t">
                        <td class="p-3 px-5"><span class="font-bold">{{ __('Totals') }}</span></td>
                        <td class="p-3 px-5">
                            <div class="flex">
                                <span class="font-semibold">
                                    {{ $items->sum('quantity') }}
                                </span>
                            </div>
                        </td>
                        <td class="p-3 px-5">
                            <span class="font-semibold">
                                {{ $items->sum('value') }}
                            </span>
                        </td>
                        <td class="p-3 px-5"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="flex mt-5 justify-end">
            <button type="button"
                class="flex px-4 py-2 border rounded-md bg-red-500 border-red-500 text-white font-medium shadow-md"
                wire:click="resetCart">
                {{ __('Reset') }}
            </button>
            <button type="button"
                class="px-4 py-2 border rounded-md bg-green-400 border-green-400 text-white font-medium shadow-md ml-2">
                {{ __('Confirm') }}
            </button>
        </div>
    </div>
</div>

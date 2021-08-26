<div class="h-full w-full rounded-md text-gray-900"
    x-data="{
        products: @entangle('products').defer,
        items: @entangle('items').defer,
        showItems: true,
        addItem() {
            this.items.push({
                'product_id': null,
                'quantity': 1,
            })
        },
        removeItem(index) {
            this.items.splice(index,1);
        },
        removeAllItems() {
            this.items.splice(0, this.items.length);
            this.addItem();
        },
        itemQuantitySum() {
            let quantityTotal = 0;

            this.items.forEach(function (el) {quantityTotal += parseInt(el.quantity)});
            return quantityTotal;
        },
        itemValueSum() {
            let valueTotal = 0;
            let products = this.products;

            this.items.forEach(function (el) {
                let productValue = el.product_id ? products[el.product_id].value : 0;
                valueTotal += productValue * parseInt(el.quantity)
            });
            return Math.round(valueTotal * 100)/100;
        }
    }"
    x-init="addItem()"
>
    <div class="mx-auto my-5">
        <h1 class="text-center text-4xl">{{ __('Cart Livewire + Alpine') }}</h1>
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
                    <template x-for="(item, index) in items">ss
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5">
                                <div class="flex flex-col">
                                    <select x-model="item.product_id"
                                    >
                                        <option value="">{{ __('Select a product') }}</option>
                                        <template x-for="product in products">
                                            <option x-bind:value="product.id" x-text="product.name"></option>
                                        </template>
                                    </select>
                                </div>
                            </td>
                            <td class="p-3 px-5">
                                <input
                                    type="number"
                                    min="1"
                                    class="bg-white text-center"
                                    x-model="item.quantity"
                                    {{-- wire:model="items.{{ $itemKey }}.quantity" --}}
                                    {{-- wire:change="changeValue({{ $itemKey }})" --}}
                                />
                            </td>
                            <td class="p-3 px-5">
                                <input
                                    type="number"
                                    class="bg-white text-center"
                                    x-bind:value="item.product_id ? Math.round(products[item.product_id].value * item.quantity * 100)/100 : 0"
                                    {{-- wire:model="items.{{ $itemKey }}.value" --}}
                                    disabled
                                />
                            </td>
                            <td class="p-3 px-5">
                                <div class="flex justify-end">
                                    <button
                                        type="button"
                                        class="py-1 px-2 m-auto h-8 text-sm text-white bg-red-500 hover:bg-red-700 rounded-lg focus:outline-none focus:shadow-outline"
                                        x-show="items.length > 1"
                                        x-on:click="removeItem(index)"
                                        {{-- wire:click="removeItem({{ $itemKey }})" --}}
                                    >
                                        <span class="material-icons-outlined w-full">
                                            remove
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="p-3 px-5">
                            <div class="flex items-center justify-center">
                                <button
                                    type="button"
                                    class="py-1 px-1 m-auto h-8 text-sm text-white bg-blue-500 hover:bg-blue-700 rounded-full focus:outline-none focus:shadow-outline"
                                    x-on:click="addItem()"
                                    {{-- wire:click="addItem" --}}
                                >
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
                                <span class="font-semibold" x-text="itemQuantitySum()">
                                    {{-- {{ $items->sum('quantity') }} --}}
                                </span>
                            </div>
                        </td>
                        <td class="p-3 px-5">
                            <span class="font-semibold" x-text="itemValueSum()">
                                {{-- {{ $items->sum('value') }} --}}
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
                x-on:click="removeAllItems()"
                {{-- wire:click="resetCart" --}}
            >
                {{ __('Reset') }}
            </button>
            <button type="button"
                class="px-4 py-2 border rounded-md bg-green-400 border-green-400 text-white font-medium shadow-md ml-2"
                x-on:click="alert('Carrinho Confirmado')"
            >
                {{ __('Confirm') }}
            </button>
        </div>
    </div>
</div>

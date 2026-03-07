<x-layout>
    <x-slot:heading>
        Product List
    </x-slot:heading>

    <div class="table-responsive">
        <x-table>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] ?? '' }}</td>
                    <td>{{ $product['name'] ?? '' }}</td>
                    <td>{{ $product['price'] ?? '' }}</td>
                </tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</x-layout>
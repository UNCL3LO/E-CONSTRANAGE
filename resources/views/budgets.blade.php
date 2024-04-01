<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-8">
            <h1 class="text-2xl font-semibold">Budgets</h1>
            <hr class="my-4">
            <div class="mb-4">
                <input type="text" class="w-full px-3 py-2 border rounded-md" placeholder="Search by Project Name">
            </div>
            <button class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-black cursor-pointer">Add New Budget</button>
            <hr class="my-4">
            <div class="border border-gray-200 rounded-md">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-200">Project Name</th>
                            <th class="px-4 py-2 border-b border-gray-200">Items</th>
                            <th class="px-4 py-2 border-b border-gray-200">Approximate Costs</th>
                            <th class="px-4 py-2 border-b border-gray-200">Approximate Quantity</th>
                            <th class="px-4 py-2 border-b border-gray-200">Approximate Total</th>
                            <th class="px-4 py-2 border-b border-gray-200">Actual Cost</th>
                            <th class="px-4 py-2 border-b border-gray-200">Actual Quantity</th>
                            <th class="px-4 py-2 border-b border-gray-200">Actual Total</th>
                            <th class="px-4 py-2 border-b border-gray-200">Items Bought On Date</th>
                            <th class="px-4 py-2 border-b border-gray-200">Items Bought Finished On</th>
                            <th class="px-4 py-2 border-b border-gray-200">Edit Budget</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-200 bg-blue">Project Names</td>
                            <td class="px-4 py-2 border-b border-gray-200">Item 1, Item 2, Item 3</td>
                            <td class="px-4 py-2 border-b border-gray-200">$100, $200, $150</td>
                            <td class="px-4 py-2 border-b border-gray-200">10, 5, 8</td>
                            <td class="px-4 py-2 border-b border-gray-200">$1000, $1000, $1200</td>
                            <td class="px-4 py-2 border-b border-gray-200">$80, $180, $140</td>
                            <td class="px-4 py-2 border-b border-gray-200">9, 4, 7</td>
                            <td class="px-4 py-2 border-b border-gray-200">$720, $720, $980</td>
                            <td class="px-4 py-2 border-b border-gray-200">June 12, 2023</td>
                            <td class="px-4 py-2 border-b border-gray-200">July 5, 2023</td>
                            <td class="px-4 py-2 border-b border-gray-200">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-md">Edit Budget</button>
                            </td>
                        </tr>
                        {/* Add more rows dynamically if needed */}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>



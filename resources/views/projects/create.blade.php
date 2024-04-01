
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Project') }}
        </h2>
    </x-slot>
    <div class="container">
        <!-- Button to open modal -->
    <button id="openModalBtn" class="btn btn-success bg-red-600">Add New Project</button>
</div>

<!-- Modal Markup -->
<div id="createProjectModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Create a New Project</h2>


        <form action="/createProject" method="POST" id="projectForm">
            @csrf
            <div class="form-group">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="form-input mt-1 block w-full" required>
            </div>
            <div class="form-group">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" id="description" class="form-textarea mt-1 block w-full"></textarea>
            </div>
            <div id="itemsContainer">
                <!-- Budget Items will be dynamically added here -->
            </div>
            <button type="button" onclick="addItem()" class="btn btn-primary bg-red hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                Add Item
            </button>
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                Create Project
            </button>
        </form>

        <script>
            function addItem() {
                var container = document.getElementById("itemsContainer");

                var itemDiv = document.createElement("div");
                itemDiv.classList.add("form-group", "bg-black");


                var nameLabel = document.createElement("label");
        nameLabel.textContent = "Budget Item:";
        nameLabel.classList.add("block", "text-gray-700");
        itemDiv.appendChild(nameLabel);



        var nameInput = document.createElement("input");
        nameInput.type = "text";
        nameInput.name = "budget_item[]";
        nameInput.classList.add("form-input", "mt-1", "block", "w-full");
        itemDiv.appendChild(nameInput);

        var quantityLabel = document.createElement("label");
        quantityLabel.textContent = "Approximate Quantity:";
        quantityLabel.classList.add("block", "text-gray-700");
        itemDiv.appendChild(quantityLabel);

        var quantityDiv = document.createElement("div");
        quantityDiv.classList.add("flex", "items-center", "mt-1");

        var quantityInput = document.createElement("input");
        quantityInput.type = "number";
        quantityInput.name = "quantity[]";
        quantityInput.classList.add("form-input", "w-1/2", "mr-2");
        quantityDiv.appendChild(quantityInput);

        var unitSelect = document.createElement("select");
        unitSelect.name = "unit[]";
        unitSelect.classList.add("form-select", "w-1/2");
        unitSelect.innerHTML = `
            <option value="litres">Litres</option>
            <option value="kgs">Kilograms</option>
            <option value="pieces">Pieces</option>
            <!-- Add more options as needed -->
        `;
        quantityDiv.appendChild(unitSelect);

        itemDiv.appendChild(quantityDiv);

        var priceLabel = document.createElement("label");
        priceLabel.textContent = "Approximate Total Price:";
        priceLabel.classList.add("block", "text-gray-700");
        itemDiv.appendChild(priceLabel);

        var priceInput = document.createElement("input");
        priceInput.type = "number";
        priceInput.name = "total_price[]";
        priceInput.classList.add("form-input", "mt-1", "block", "w-full");
        itemDiv.appendChild(priceInput);

          // Create delete button
    var deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.type = "button";
    deleteButton.classList.add("btn", "btn-danger", "ml-2");
    deleteButton.onclick = function() {
        container.removeChild(itemDiv); // Remove the item entry form when delete button is clicked
    };
    itemDiv.appendChild(deleteButton);

        container.appendChild(itemDiv);
    }
        </script>


    <!-- JavaScript to handle modal display -->
    <script>
        // When the document is ready
        document.addEventListener('DOMContentLoaded', function () {
            // Open the modal when the button is clicked
            document.getElementById('openModalBtn').addEventListener('click', function () {
                document.getElementById('createProjectModal').style.display = 'block';
            });

            // Close the modal when the close button is clicked
            document.querySelector('.close').addEventListener('click', function () {
                document.getElementById('createProjectModal').style.display = 'none';
            });
        });
    </script>


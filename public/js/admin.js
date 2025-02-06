// Control Sidebar
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.toggle-sidebar-btn');
    const navmargin = document.querySelector('.header-nav');
    const body = document.getElementsByTagName('body')[0]; // Access the first element

    if (window.innerWidth <= 912) {
        body.classList.add('sidebar-hidden');
        navmargin.classList.remove('ms-auto');
    } else {
        body.classList.remove('sidebar-hidden');
        navmargin.classList.add('ms-auto');
    }

    toggleButton.addEventListener('click', function () {
        body.classList.toggle('sidebar-hidden');
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth <= 912) {
            if (!body.classList.contains('sidebar-hidden')) {
                body.classList.add('sidebar-hidden');
            }
            navmargin.classList.remove('ms-auto');
        } else {
            if (body.classList.contains('sidebar-hidden')) {
                body.classList.remove('sidebar-hidden');
            }
            navmargin.classList.add('ms-auto');
        }
    });

    // for all delete buttons in admin -> sweetalert2 fire
    document.body.addEventListener("click", function (event) {
        let button = event.target.closest(".delete-button");
        if (!button) return;

        event.preventDefault();
        let deleteUrl = button.dataset.url;

        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    });
});


// Add player control ====> to show properties he should follow and fill
let sportProperties = JSON.parse(document.getElementById("sportProperties").textContent);
let playerRoleId = JSON.parse(document.getElementById("playerRoleId").textContent);

document.getElementById("role").addEventListener("change", function () {
    console.log("Selected Role ID:", this.value);
    console.log("Player Role ID:", playerRoleId);
    console.log("Sport Properties Object:", sportProperties);

    document.getElementById("team_select").classList.toggle("d-none", this.value != playerRoleId);

    document.getElementById("player_properties").innerHTML = "";
});

document.getElementById("team_id").addEventListener("change", function () {
    let teamId = this.value;
    let sportId = this.options[this.selectedIndex]?.dataset.sportId;
    let propertiesContainer = document.getElementById("player_properties");
    if (!teamId) {
        propertiesContainer.innerHTML = "";
        return;
    }
    propertiesContainer.innerHTML = "";

    if (sportProperties[sportId]) {
        console.log("Properties Found:", sportProperties[sportId]); // Debug

        sportProperties[sportId].forEach(property => {
            let inputField = '';

            switch (property.input_type) {
                case 'text':
                    inputField = `<input type="text" class="form-control property-input" data-input-type="text" name="player_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                    break;
                case 'number':
                    inputField = `<input type="number" class="form-control" name="player_properties[${property.id}]" placeholder="Enter ${property.name}" min="0">`;
                    break;
                case 'date':
                    inputField = `<input type="date" class="form-control" name="player_properties[${property.id}]">`;
                    break;
                case 'boolean':
                    inputField = `
                    <select class="form-control" name="player_properties[${property.id}]">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>`;
                    break;
                case 'dropdown':
                    let options = property.options ? property.options.split(',').map(option => `<option value="${option.trim()}">${option.trim()}</option>`).join('') : '';
                    inputField = `
                    <select class="form-control" name="player_properties[${property.id}]">
                        ${options}
                    </select>`;
                    break;
                default:
                    inputField = `<input type="text" class="form-control" name="player_properties[${property.id}]" placeholder="Enter ${property.name}">`;
                    break;
            }

            let field = `
            <div class="form-group col-md-6">
                <label>${property.name}</label>
                ${inputField}
            </div>`;

            propertiesContainer.innerHTML += field;
        });

        document.querySelectorAll('.property-input').forEach(input => {
            input.addEventListener('input', function (event) {
                if (this.dataset.inputType === "text") {
                    this.value = this.value.replace(/\d/g, ""); // Remove numbers from text input
                }
            });
        });
    }
});



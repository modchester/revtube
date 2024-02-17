var isAccDropdownOpened = false
var dropdown = document.getElementById("accountDropdown")
var dropdownicon = document.getElementById("dropdown-icon")

function openAccountDropdown() {
    if (isAccDropdownOpened) {
        dropdown.style.display = "none"
        dropdownicon.className = "bi bi-caret-down-fill"
        isAccDropdownOpened = false
    } else {
        dropdown.style.display = "block"
        dropdownicon.className = "bi bi-caret-up-fill"
        isAccDropdownOpened = true
    }
}
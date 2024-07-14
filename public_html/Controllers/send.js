function submitForms() {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(document.getElementById("employeeForm"));

    // Check if any fields are empty
    for (var pair of formData.entries()) {
        if (pair[1].trim() === '') {
            alert("Veuillez remplir tous les champs");
            return; // Stop form submission if any field is empty
        }
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Models/insert/newEmp.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            alert("Employee Added Successfully");
            window.location.reload(); // Reload the page after successful submission
        } else {
            console.error('Error occurred: ' + xhr.status);
        }
    };

    xhr.send(formData); // Send form data via AJAX
}
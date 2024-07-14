function EditEmp() {
    // Display confirmation dialog using SweetAlert
    Swal.fire({
        title: 'Are you sure?',
        text: "are you sure to update",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Updated it!'
    }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(document.getElementById("UpdateEmp"));

            // Check if any fields are empty
            for (var pair of formData.entries()) {
                if (pair[1].trim() === '') {
                    alert("Please fill in all fields");
                    return; // Stop form submission if any field is empty
                }
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Models/update/updateEmp.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    Swal.fire(
                        'Updated',
                        'Update successfully.',
                        'success'
                    ).then(() => {
                        window.location.reload(); // Reload the page after successful deletion
                    });
                } else {
                    console.error('Error occurred: ' + xhr.status);
                }
            };

            xhr.send(formData); // Send form data via AJAX
        }
    });
}
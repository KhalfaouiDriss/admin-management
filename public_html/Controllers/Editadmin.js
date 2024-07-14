

function EditadminX() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Are you sure you want to update?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("UpdateAdmin"));
            for (var pair of formData.entries()) {
                if (typeof pair[1] === 'string' && pair[1].trim() === '') {
                    alert("Please fill in all fields");
                    return;
                }
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Models/update/updateadmin.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    Swal.fire(
                        'Updated',
                        'Update successfully.',
                        'success'
                    ).then(() => {
                        window.location.reload();
                    });
                } else {
                    console.error('Error occurred: ' + xhr.status);
                    Swal.fire(
                        'Error',
                        'Error occurred:' + xhr.status,
                        'error'
                    )
                }
            };

            xhr.send(formData);
        }
    });
}



$(document).ready(function () {
    // Function to fetch and update income data
    function updateIncome() {
        $.ajax({
            url: "/get-income-data", // Use the new route
            method: "GET",
            success: function (data) {
                // Extract the income value from the response
                var incomeValue = data.income;

                // Update the income value in the specific element
                $("#income-section").text("$" + incomeValue);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    // Call the updateIncome function initially
    updateIncome();

    // Set up a timer to periodically update the income data (e.g., every 5 seconds)
    setInterval(updateIncome, 5000); // Adjust the interval as needed

    $(".delete-button").on("click", function () {
        // Get the user's name from the data attribute
        var userName = $(this).data("user-name");
        var userId = $(this).data("user-id");

        // Update the content of the modal with the user's name
        $("#userName").text(userName);
        $("#deleteUserButton").attr("data-user-id", userId);
    });

    $("#deleteUserButton").on("click", function () {
        // Get the user's ID from the #deleteUserButton data attribute
        var userId = $(this).data("user-id");

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Send an AJAX request to delete the user using a POST request with _method=DELETE
        $.ajax({
            url: "/users/delete/" + userId,
            type: "POST",
            data: {
                _method: "DELETE",
                _token: csrfToken,
            },
            success: function (data) {
                // Handle success (e.g., close the modal and update the UI)
                $("#deleteModal").modal("hide"); // Close the modal
                // You can add code here to remove the user's entry from the UI or perform any other actions
            },
            error: function (xhr, status, error) {
                // Handle error (e.g., show an error message)
                console.error(error);
                // You can add code here to display an error message to the user
            },
        });
    });
});

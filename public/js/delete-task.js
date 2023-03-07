//JavaScript to display confirmation popup

// Listen for clicks on delete task buttons
const deleteTaskLinks = document.querySelectorAll(".delete-task");
deleteTaskLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
        event.preventDefault();

        // Get the task ID from the data-task-id attribute
        const taskId = link.getAttribute("data-task-id");

        // Ask the user for confirmation before deleting the task
        const confirmed = confirm("Are you sure you want to remove this task?");
        if (confirmed) {
            // Submit the delete form
            const deleteForm = document.querySelector(`#delete-task-${taskId}`);
            deleteForm.submit();
        }
    });
});

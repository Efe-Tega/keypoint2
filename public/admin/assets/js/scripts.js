// Flash message handler
document.addEventListener("DOMContentLoaded", function () {
    // Auto-hide flash messages
    const successMessage = document.getElementById('successMessage');
    if (successMessage) {
        setTimeout(() => successMessage.style.display = 'none', 3000);
    }

    // Image preview functionality
    const imageInput = document.getElementById('image');
    if (imageInput) {
        imageInput.addEventListener('change', function (e) {
            const reader = new FileReader();
            const preview = document.getElementById('showImage');
            if (preview) {
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    }

    // Slug generator
    const nameInput = document.getElementById('movie-title');
    const slugInput = document.getElementById('task-slug');
    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function () {
            slugInput.value = nameInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });
    }

    // Form submission handler
    const uploadForm = document.getElementById('uploadForm');
    if (uploadForm) {
        uploadForm.addEventListener('submit', function () {
            const uploadBtn = document.getElementById('uploadBtn');
            const spinner = document.getElementById('spinner');
            if (uploadBtn) uploadBtn.classList.add('d-none');
            if (spinner) spinner.classList.remove('d-none');
        });
    }


    // === Modal Edit ==
    const editButtons = document.querySelectorAll('.edit-level');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Get the data attributes
            const id = this.getAttribute('data-id');
            const level = this.getAttribute('data-level');
            const amount = this.getAttribute('data-amount');
            const action = this.getAttribute('data-action');

            // Set the form values
            document.getElementById('level-id').value = id;
            document.getElementById('level').value = level;
            document.getElementById('amount').value = amount;

            // Update form action URL
            document.querySelector('.credit-debit-modal form').action = action;
        });
    });
});
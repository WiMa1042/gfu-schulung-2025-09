document.addEventListener('DOMContentLoaded', function() {
    //confirmations delete
   /** document.querySelector('.btn-confirm').addEventListener('click', function(event) {
        if (!confirm('Are you sure you want to delete this item?')) {
            event.preventDefault();
        }
    });*/

    document.querySelectorAll('.btn-confirm').forEach(function(button) {
        button.addEventListener('click', function(event) {
            if (!confirm(event.target.dataset.message)) {
                event.preventDefault();
            }
        });
    });
})
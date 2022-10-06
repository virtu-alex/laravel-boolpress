const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', event => {
        event.preventDefault();
        const hasConfirmed = confirm('Sei sicuro di voler eliminare questo post?');
        if (hasConfirmed) form.submit();
    })
});
const deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const confirm = window.confirm('Are you sure you want to delete this post?');
    if(confirm) this.submit();
  })
});
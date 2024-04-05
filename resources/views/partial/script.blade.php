<script>
// JavaScript to highlight the active link
document.addEventListener("DOMContentLoaded", function() {
  const navbarLinks = document.querySelectorAll('.navbar a');

  navbarLinks.forEach(navbarLink => {
    navbarLink.addEventListener('click', function(event) {
      navbarLinks.forEach(link => {
        link.classList.remove('active');
      });
      event.target.classList.add('active');
    });
  });
});
</script>
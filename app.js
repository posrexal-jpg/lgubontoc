// Navigation toggle (mobile)
function toggleNav() {
  document.getElementById('navList').classList.toggle('open');
}

// Active nav link on scroll
const sections = document.querySelectorAll('section[id], div[id]');
const navLinks = document.querySelectorAll('.nav-link');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      navLinks.forEach(link => {
        link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
      });
    }
  });
}, { rootMargin: '-40% 0px -55% 0px' });

sections.forEach(s => observer.observe(s));

// Back to top button
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
  backToTop.classList.toggle('visible', window.scrollY > 400);
});

// Close mobile nav when a link is clicked
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', () => {
    document.getElementById('navList').classList.remove('open');
  });
});

// Contact form submission
function handleFormSubmit(e) {
  e.preventDefault();
  const note = document.getElementById('formNote');
  note.textContent = 'Thank you! Your message has been received. We will get back to you within 2–3 business days.';
  e.target.reset();
  setTimeout(() => { note.textContent = ''; }, 6000);
}

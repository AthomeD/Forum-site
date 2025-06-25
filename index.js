function toggleContainer(id) {
    const section = document.getElementById(`post-section-${id}`);
    const button = document.getElementById(`toggle-btn-${id}`);

    if (section.classList.contains('open')) {
      section.classList.remove('open');
      button.textContent = 'Open';
    } else {
      section.classList.add('open');
      button.textContent = 'Close';
    }
  }